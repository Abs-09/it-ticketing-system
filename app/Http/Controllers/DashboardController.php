<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() : View
    {
        $donutData = [
            'Admins' => User::where('role', 'admin')->get()->count(),
            'Regular Users' => User::where('role', 'user')->get()->count(),
            'Tech Staff' => User::where('role', 'tech_staff')->get()->count(),
        ];

        // $barData = [];
        $barData = [];
        $techStaffs = User::where('role', 'tech_staff')->get();
        foreach($techStaffs as $techStaff) {
            $barData[$techStaff->name] = Ticket::where('assigned_to', $techStaff->id)->where('status', 'resolved')->get()->count();
        }

        return view('dashboard', [
            'total_users' => User::all()->count(),
            'total_tickets' => Ticket::all()->count(),
            'total_tickets_pending' => Ticket::where('status','!=','closed')->count(),
            'total_tickets_closed' => Ticket::where('status', 'closed')->count(),
            'donut_data' => $donutData,
            'bar_data' => $barData,
        ]);
    }
}
