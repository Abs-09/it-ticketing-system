<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(): View
    {
        return view('tickets.index', [
            'tickets' => Ticket::latest()->paginate(10)
        ]);
    }


    public function show(Ticket $ticket): View
    {
        return view('tickets.show', ['ticket' => $ticket]);
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

        Ticket::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'priority' => $request->priority,
            'status' => 'open'
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }
}
