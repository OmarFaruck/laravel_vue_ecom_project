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
            'Ticket' => Ticket::all(),
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
            'status' => 'required|in:open,closed,pending,resolved',
            'attachment_image' => 'nullable|image|max:2048',
            'admin_reply' => 'required|string|max:255',
        ]);

        if ($request->hasFile('attachment_image')) {

        $attachment_image = $request->file('attachment_image');

        $imageName = time() . '.' . $attachment_image->getClientOriginalExtension();

        $attachment_image->storeAs('ticket', $imageName, 'public');

        $data['attachment_image'] = $imageName;
    }

        Ticket::create([
            'ticket_number' => $data['ticket_number'],
            //  'user_id' => Auth::id(),
            'user_id' => $data['user_id'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'priority' => $data['priority'],
            'status' => $data['status'],
            'attachment_image' => $data['attachment_image'] ?? null,
            'admin_reply' => $data['admin_reply'] ?? null,
        ]);

         
        return redirect()->route('ticket_page.index');
    }

    public function edit($id)
    {
        $Ticket = Ticket::findOrFail($id);
         return Inertia::render('Admin/Ticket/TicketPage', [
            'Ticket' => $Ticket,
        ]);
    }

    public function update(Request $request, $id)
    {
        $Ticket = Ticket::findOrFail($id);

        $ticket = $request->validate([
            'ticket_number' => 'required|unique:tickets,ticket_number,' . $Ticket->id,
            'user_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,closed,pending,resolved',
            'attachment_image' => 'nullable|image|max:2048',
            'admin_reply' => 'required|string|max:255',
        ]);

        if ($request->hasFile('attachment_image')) {
            $attachment_image = $request->file('attachment_image');
            $imageName = time() . '.' . $attachment_image->getClientOriginalExtension();
            $attachment_image->storeAs('ticket', $imageName, 'public');
            $ticket['attachment_image'] = $imageName;
        }

        $Ticket->update([
            'ticket_number' => $ticket['ticket_number'],
            'user_id' => $ticket['user_id'],
            'subject' => $ticket['subject'],
            'message' => $ticket['message'],
            'priority' => $ticket['priority'],
            'status' => $ticket['status'],
            'attachment_image' => $ticket['attachment_image'] ?? $Ticket->attachment_image,
            'admin_reply' => $ticket['admin_reply'],
        ]);

        return redirect()->route('ticket_page.index');
    }

    public function destroy($id)
    {
        $Ticket = Ticket::findOrFail($id);
        $Ticket->delete();

        return redirect()->route('ticket_page.index');
    }
}