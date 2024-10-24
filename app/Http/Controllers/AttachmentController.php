<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request, Ticket $ticket): RedirectResponse
    {
        // dd($request->all(), $ticket);
        $request->validate([
            'file' => 'required|max:50000',
        ]);

        $filepath = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->storePubliclyAs('documents/tickets/attachment', $filepath, 'public');

        $attachment = new Attachment();
        $attachment->ticket_id = $ticket->id;
        $attachment->file_path = $filepath;
        $attachment->file_name = $request->file_name;
        $attachment->save();


        return redirect()->back()->with('success', 'File uploaded successfully');
    }

    public function download(Attachment $attachment)
    {
        // dd($attachment->file_name);
        if (!Storage::disk('public')->exists('documents/tickets/attachment/' . $attachment->file_path)) {
            return redirect()->back()->with('error', 'file does not exists');
        }
        return response()->download('storage/documents/tickets/attachment/' . $attachment->file_path);
    }
}
