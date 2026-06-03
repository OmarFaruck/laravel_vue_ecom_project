<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Ticket/TicketPage', [
            'tickets' => Ticket::all(),
        ]);
    }

    public function create()
    {
        // Code to show a form for creating a new ticket
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'ticket_number' => 'required|unique:tickets',
            'user_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,closed,pending',
            'attachment_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('attachment_image')) {

        $attachment_image = $request->file('attachment_image');

        $imageName = time() . '.' . $attachment_image->getClientOriginalExtension();

        $attachment_image->storeAs('attachments', $imageName, 'public');

        $data['attachment_image'] = $imageName;
    }

        Ticket::create([
            'ticket_number' => $data['ticket_number'],
             'user_id' => Auth::id(),
            'subject' => $data['subject'],
            'message' => $data['message'],
            'priority' => $data['priority'],
            'status' => $data['status'],
            'attachment_image' => $data['attachment_image'] ?? null,
        ]);

        return redirect()->route('ticket_page.index');
    }

    public function edit($id)
    {
         
    }

    public function update(Request $request, $id)
    {
        // Code to update an existing ticket in the database
    }

    public function destroy($id)
    {
        // Code to delete a ticket from the database
    }
}
