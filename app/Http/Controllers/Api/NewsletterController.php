<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NewsletterRequest;
use App\Models\NewsletterSubscriber;
use Spatie\Newsletter\Facades\Newsletter;

class NewsletterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function subscribe(NewsletterRequest $request)
    {
        if (!Newsletter::isSubscribed($request->email)) {
            if (Newsletter::subscribe($request->email)) {
                NewsletterSubscriber::create(['email', $request->email]);
                return response()->json(['message' => 'Succesfully subscribed to newsletters'], 200);
            }
        }

        return response()->json(['message' => 'Already subscribed to news letter'], 400);
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
