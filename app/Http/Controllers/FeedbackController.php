<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        $feedback = Feedback::create([
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'user_id' => Auth::id()
        ]);

        return redirect()->route('dashboard')->with('success', 'Feedback submitted successfully!');
    }

    public function index()
    {
        // Only admin can view all feedback
        if (!Auth::user()->is_admin) {
            return redirect()->route('dashboard');
        }

        $feedbacks = Feedback::with('user')->latest()->paginate(10);
        return view('feedback.index', compact('feedbacks'));
    }

    public function updateStatus(Feedback $feedback)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('dashboard');
        }

        $feedback->update([
            'status' => 'reviewed'
        ]);

        return back()->with('success', 'Feedback status updated.');
    }
}
