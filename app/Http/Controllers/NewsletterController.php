<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter, Request $request)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe($request->input('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Your provided email could not be added for our newsletter'
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
