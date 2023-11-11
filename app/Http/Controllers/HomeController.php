<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('home', ['user' => $user]);
    }

    public function submitFeedback(SubmitFeedbackRequest $request)
    {

        Feedback::create([
            'user_id' => auth()->id(),
            'feedback_text' => $request->feedback_text,
            'valid_twitter_account' => $request->valid_twitter_account
        ]);
        return response()->json(['message' => $request->feedback_text]);
    }
}
