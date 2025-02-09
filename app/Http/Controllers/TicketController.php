<?php
// app/Http/Controllers/TicketController.php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request) {
        $user = $request->session()->get("user");
        $tickets = Ticket::with('messages')->where('user_id', $user->id)->get();
        return view('tickets.user.index', compact('tickets'));

    }

    public function create() {
        return view('tickets.user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        $user = $request->session()->get("user");

        $ticket = Ticket::create([
            'user_id' => $user->id,
            'subject' => $request->subject,
        ]);

        return redirect()->route('user.tickets.index', $ticket->id);
    }

    public function show(Request $request, Ticket $ticket) {
        $user = $request->session()->get("user");

        if ($user->id !== $ticket->user_id) {
            abort(403, 'Unauthorized access.');
        }
        
        return view('tickets.user.show', compact('ticket'));
    }

    public function close(Ticket $ticket) {
        $user = $request->session()->get("user");

        if ($user->id !== $ticket->user_id) {
            abort(403, 'Unauthorized access.');
        }

        $ticket->update([
            'status' => 'closed',
            'closed_by' => auth('admin')->user() ? 'admin' : 'user',
        ]);

        return back()->with('status', 'Ticket closed successfully.');
    }
}
