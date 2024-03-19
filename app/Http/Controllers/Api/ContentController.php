<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DownloadContentEbookRequest;
use App\Http\Requests\Api\NewsletterRequest;
use App\Http\Resources\Api\ContentResource;
use App\Models\Contact;
use App\Models\Content;
use App\Models\LogActivity;
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

        LogActivity::add('API Content List');
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

        LogActivity::add('API Content Detail');
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

        // if (Contact::where('email', $input['email'])->exists()) {
        //     return response()->json(['message' => 'Already downloaded E-book', 'status_code' => 201], 201);
        // }

        // Record email and send e-book
        $filePath = null;
        $input['title'] = '';
        $content = Content::where('slug', $input['slug'])->firstOrFail();
        if ($content->id == 32) {
            $input['title'] = 'Panduan Anda memulai strategi digital marketing';
            $filePath = public_path('attachments/[ebook] SIPS Digital Creative.pdf');
        } elseif ($content->id == 53) {
            $input['title'] = 'BRAND STRATEGY TOOLKIT';
            $filePath = public_path('attachments/[ebook] SIPS Digital Creative Brand Strategy Toolkit.pdf');
        } elseif ($content->id == 71) {
            $input['title'] = 'Ramadan Marketing 2024';
            $filePath = public_path('attachments/[ebook] Ramadan Marketing 2024.pdf');
        } elseif ($content->id == 85) {
            $input['title'] = 'White Paper HCP Engagement';
            $filePath = public_path('attachments/White Paper HCP Engagement.pdf');
        } else {
            return response()->json(['message' => 'Error - '], 404);
        }

        $sendMail = $this->sendMail($input, $filePath);

        Contact::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'company' => $input['company'],
            'phone' => $input['phone'] ?? null,
            'description' => 'Download E-book ' . $input['title']
        ]);

        LogActivity::add('API Download E-book');
        return response()->json(['message' => 'E-book sent to your email!', 'status_code' => 200], 200);
    }

    private function sendMail($data, $file)
    {
        try {
            Mail::send('mail.download-content-ebook', $data, function ($message) use ($data, $file) {
                $message->to($data["email"])
                    ->from(config('mail.from.address'), config('mail.from.name'))
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
