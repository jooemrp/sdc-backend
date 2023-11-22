<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NewsletterRequest;
use App\Models\LogActivity;
use App\Models\NewsletterSubscriber;
use Spatie\Newsletter\Facades\Newsletter;
use Mail;

class NewsletterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function subscribe(NewsletterRequest $request)
    {
        if (
            Newsletter::isSubscribed($request->email)
            && NewsletterSubscriber::where('email', $request->email)->exists()
        ) {
            return response()->json(['message' => 'Already subscribed to newsletter'], 200);
        }

        // Subscribe Newsletter Mailchimp
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribe($request->email);
        }

        // Record email and send e-book
        // if ($this->sendMail($request->email)) {
        NewsletterSubscriber::create(['email' => $request->email]);
        // }

        LogActivity::add('API Subscribe Newsletter');
        return response()->json(['message' => 'Succesfully subscribed to newsletters'], 200);
    }

    private function sendMail($email)
    {
        try {
            $data["email"] = $email;
            $data["title"] = 'Welcome';
            $data["body"] = "Thank you for subscribing to our newsletter. Here is a free e-book for you!";

            $files = [
                public_path('attachments/test_image.jpeg'),
                public_path('attachments/test_pdf.pdf'),
            ];

            Mail::send('mail.subscribe-newsletter', $data, function ($message) use ($data, $files) {
                $message->to($data["email"])
                    ->from(config('app.url'), config('app.name'))
                    ->subject($data["title"]);

                foreach ($files as $file) {
                    $message->attach($file);
                }
            });
        } catch (\Throwable $t) {
            report($t);
        } catch (Exception $e) {
            // var_dump($e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function unsubscribe(NewsletterRequest $request)
    {
        Newsletter::unsubscribe($request->email);
        return response()->json(['message' => 'Succesfully unsubscribed to newsletters'], 200);
    }
}
