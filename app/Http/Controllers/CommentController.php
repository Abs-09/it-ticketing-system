<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'comment' => 'required|max:500'
        ]);

        $ticket = Ticket::where('id', $request->ticket_id)->first();

        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found');
        }

        $user = User::where('id', $request->user_id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'user not found');
        }

        try {

            Comment::create([
                'user_id' => $user->id,
                'ticket_id' => $ticket->id,
                'comment' => $request->comment,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }

        return redirect()->back();
    }

    public function destroy(Request $request, Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
