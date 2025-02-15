<?php
// app/Http/Controllers/Admin/TicketController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Message;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request) {
        // Filter by status if provided
        $tickets = Ticket::with('user')
            ->when($request->ticketId, function ($query, $id) {
                return $query->where('id', $id);
            })
            ->when($request->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

            // return $tickets;

        return view('tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket) {
        $ticket->load('messages.sender');

        return view('tickets.show', compact('ticket'));
    }

    public function reply(Request $request, Ticket $ticket) {

        $request->validate([
            'message' => 'required|string',
            'attachment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachmentPath = time() . "_attachment" . $attachment->extension();
            $attachment->move(public_path('storage'), $attachmentPath);
        }

        Message::create([
            'ticket_id' => $ticket->id,
            'sender_id' => auth('admin')->user()->id, 
            'sender_type' => 'App\\Models\\admins',
            'message' => $request->message,
            'attachment' => $attachmentPath,
        ]);

        // Optionally mark ticket as pending after admin reply
        $ticket->update(['status' => 'pending']);

        return back()->with('success', 'Reply sent successfully.');
    }

    public function close(Ticket $ticket) {
        $ticket->update([
            'status' => 'closed',
            'closed_by' => 'admin'
        ]);

        return back()->with('success', 'Ticket closed.');
    }
}
