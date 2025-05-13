<?php
// app/Http/Controllers/Admin/TicketController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\User;
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
        $ticket->load('messages.sender')->load('user');

        return view('tickets.show', compact('ticket'));
    }

    public function create() {
        return view('tickets.add');
    }

    public function store(Request $request) {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'user_id' => 'required',
        ]);

        $user_id = str_replace('UM-CL-00', '', $request->user_id);

        $user = User::find($user_id);
        if (!$user) {
            return back()->with('error', 'Invalid user ID.');
        }

        $ticket = Ticket::create([
            'user_id' => $user->id,
            'user_type' => get_class($user),
            'subject' => $request->subject,
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            // $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            if ($request->hasFile('attachment')) {
                $attachment = $request->file('attachment');
                $attachmentPath = time() . "_attachment" . $attachment->extension();
                $attachment->move(public_path('storage'), $attachmentPath);
            }
        }

        Message::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $user->id,
            'sender_type' => get_class($user),
            'message' => $request->message,
            'attachment' => $attachmentPath,
        ]);

        if ($request->expectsJson()) {
            return responseJson(null, 200, "Ticket created");
        }

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket created successfully.');
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
