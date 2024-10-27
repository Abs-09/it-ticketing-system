<?php

namespace App\Http\Controllers;

use App\Models\TicketHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketHistoryController extends Controller
{
    public function index(): View
    {
        return view('tickets.histories.index', [
            'histories' => TicketHistory::where('change_type', 'status')->orderBy('changed_date', 'desc')->paginate(10)
        ]);
    }
}
