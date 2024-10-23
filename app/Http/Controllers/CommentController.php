<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function destroy(Request $request): RedirectResponse
    {

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
