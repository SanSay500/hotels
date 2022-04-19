<?php

namespace App\Http\Controllers;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;


class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        $users = User::latest()->get();

        return Inertia::render('feedback', ['users' => $users]);
    }
}

