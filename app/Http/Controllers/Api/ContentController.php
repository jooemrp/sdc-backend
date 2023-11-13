<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DownloadContentEbookRequest;
use App\Http\Requests\Api\NewsletterRequest;
use App\Http\Resources\Api\ContentResource;
use App\Models\Content;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $content = Content::query();
        if ($request->type) {
            $content = $content->where('type', $request->type);
        }
        $content = $content
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($request->per_page ?? 10)
            ->appends(request()->input());

        return ContentResource::collection($content);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $content = Content::where('id', $id)->orWhere('slug', $id)->first();
        $content->update(['views' =>  $content->views + 1]);

        return ContentResource::make($content);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function downloadEbook(DownloadContentEbookRequest $request)
    {
        $input = $request->all();

        if (NewsletterSubscriber::where('email', $input['email'])->exists()) {
            return response()->json(['message' => 'Already downloaded E-book'], 200);
        }

        // Record email and send e-book
        $filePath = null;
        $title = '';
        $content = Content::where('slug', $input['slug'])->firstOrFail();
        if ($content->id == 32) {
            $input['title'] = 'Panduan Anda memulai strategi digital marketing';
            $filePath = public_path('attachments/[ebook] SIPS Digital Creative.pdf');
        }

        $sendMail = $this->sendMail($input, $filePath);
        if ($sendMail) {
            NewsletterSubscriber::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'company' => $input['company']
            ]);
        }

        return response()->json(['message' => 'E-book sent to your email!'], 200);
    }

    private function sendMail($data, $file)
    {
        try {
            Mail::send('mail.download-content-ebook', $data, function ($message) use ($data, $file) {
                $message->to($data["email"])
                    ->from(config('app.url'), config('app.name'))
                    ->subject($data["title"])
                    ->attach($file);
            });
        } catch (\Throwable $t) {
            report($t);
        } catch (Exception $e) {
            // var_dump($e->getMessage());
            return false;
        }

        return true;
    }
}
