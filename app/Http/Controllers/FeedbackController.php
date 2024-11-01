<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/FeedbackController.php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'nullable|string',
            'score' => 'nullable|integer|min:1|max:5',
        ]);

        Feedback::create($request->all());

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }

    
}
