<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AgentsTicketController extends Controller
{
    public function index(Request $request) {
        $user = $request->session()->get("agents");
        $tickets = Ticket::with('messages')->where("user_type", get_class($user))->where('user_id', $user->id)->get();
        return view('tickets.agents.index', compact('tickets'));

    }

    public function create() {
        return view('tickets.agents.create');
    }

    public function store(Request $request) {
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        $user = $request->session()->get("agents");

        $ticket = Ticket::create([
            'user_id' => $user->id,
            'user_type' => get_class($user),
            'subject' => $request->subject,
        ]);

        return redirect()->route('agent.tickets.index', $ticket->id);
    }

    public function show(Request $request, Ticket $ticket) {
        $user = $request->session()->get("agents");

        if ($user->id !== $ticket->user_id) {
            abort(403, 'Unauthorized access.');
        }
        
        return view('tickets.agents.show', compact('ticket'));
    }

    public function close(Ticket $ticket) {
        $user = $request->session()->get("agents");

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
