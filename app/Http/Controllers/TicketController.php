<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\TicketHistory;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(): View
    {
        return view('tickets.index', [
            'tickets' => Ticket::latest()->filter(request(['priority', 'status', 'created_by', 'assigned_to']))->paginate(10)->appends(request()->query())
        ]);
    }


    public function show(Ticket $ticket): View
    {
        return view('tickets.show', [
            'ticket' => $ticket,
            'comments' => Comment::where('ticket_id', $ticket->id)->latest()->get(),
            'attachments' => Attachment::where('ticket_id', $ticket->id)->latest()->get()
        ]);
    }


    public function create(): View
    {
        return view('tickets.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => "required|max:50",
            'description' => "required|max:100"
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'priority' => $request->priority,
            'status' => 'open'
        ]);

        if (!$ticket) {
            return redirect()->back()->with('error', ' Something went wrong');
        }

        $history = new TicketHistory();
        $history->ticket_id = $ticket->id;
        $history->changed_by = auth()->user()->id;
        $history->change_type = 'status';
        $history->old_value = 'null';
        $history->new_value = 'open';
        $history->changed_date = now();
        $history->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }

    public function resolve(Ticket $ticket, $user_id): RedirectResponse
    {
        // dd($ticket, $user_id);
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'user not found');
        }
        $oldstatus = $ticket->status;
        $ticket->status = 'resolved';
        $newstatus = $ticket->status;
        $ticket->resolved_at = now();
        if (!$ticket->save()) {
            return redirect()->back()->with('error', 'Error while changing ticket status');
        }

        $history = new TicketHistory();
        $history->ticket_id = $ticket->id;
        $history->changed_by = $user->id;
        $history->change_type = 'status';
        $history->old_value = $oldstatus;
        $history->new_value = $newstatus;
        $history->changed_date = now();
        if (!$history->save()) {
            return redirect()->back()->with('error', 'Error while saving ticket history');
        }

        return redirect()->back()->with('success', 'Ticket Assigned');
    }

    public function close(Ticket $ticket, $user_id): RedirectResponse
    {
        // dd($ticket, $user_id);
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'user not found');
        }
        $oldstatus = $ticket->status;
        $ticket->status = 'closed';
        $newstatus = $ticket->status;
        $ticket->assigned_to = $user->id;
        $ticket->closed_at = now();
        if (!$ticket->save()) {
            return redirect()->back()->with('error', 'Error while changing ticket status');
        }

        $history = new TicketHistory();
        $history->ticket_id = $ticket->id;
        $history->changed_by = $user->id;
        $history->change_type = 'status';
        $history->old_value = $oldstatus;
        $history->new_value = $newstatus;
        $history->changed_date = now();
        if (!$history->save()) {
            return redirect()->back()->with('error', 'Error while saving ticket history');
        }

        return redirect()->back()->with('success', 'Ticket Assigned');
    }
    
    public function assign(Ticket $ticket, $user_id): RedirectResponse
    {
        // dd($ticket, $user_id);
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'user not found');
        }
        $oldstatus = $ticket->status;
        $ticket->status = 'in_progress';
        $newstatus = $ticket->status;
        $ticket->assigned_to = $user->id;
        $ticket->assigned_at = now();
        if (!$ticket->save()) {
            return redirect()->back()->with('error', 'Error while changing ticket status');
        }

        $history = new TicketHistory();
        $history->ticket_id = $ticket->id;
        $history->changed_by = $user->id;
        $history->change_type = 'status';
        $history->old_value = $oldstatus;
        $history->new_value = $newstatus;
        $history->changed_date = now();
        if (!$history->save()) {
            return redirect()->back()->with('error', 'Error while saving ticket history');
        }

        return redirect()->back()->with('success', 'Ticket Assigned');
    }
}
