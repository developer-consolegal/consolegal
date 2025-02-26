<?php
// app/Http/Controllers/TicketController.php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request) {

        if ($request->expectsJson()) {
            $user = getAuthUser($request);
        }else{
            $user = $request->session()->get("user");
        }
        // $tickets = Ticket::with('messages')->where("user_type", get_class($user))->where('user_id', $user->id)->get();

        $query = Ticket::where("user_type", get_class($user))
        ->where('user_id', $user->id);

        if ($request->has('status') && !empty($request->status)) {

            if($request->status == 'closed'){
                $query->where('status', $request->status);
            }else{
                $query->where('status', '!=', 'closed');
            }
        }

        $tickets = $query->orderBy('created_at', 'desc')->simplePaginate(10);

        if ($request->expectsJson()) {
            return responseJson($tickets, 200);
        }

        return view('tickets.user.index', compact('tickets'));
    }

    public function create() {
        return view('tickets.user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        if ($request->expectsJson()) {
            $user = getAuthUser($request);
        }else{
            $user = $request->session()->get("user");
        }

        $ticket = Ticket::create([
            'user_id' => $user->id,
            'user_type' => get_class($user),
            'subject' => $request->subject,
        ]);

        if ($request->expectsJson()) {
            return responseJson(null, 200, "Ticket created");
        }

        return redirect()->route('user.tickets.index', $ticket->id);
    }

    public function show(Request $request, Ticket $ticket) {

        $ticket->load('messages');
        if ($request->expectsJson()) {
            $user = getAuthUser($request);
        }else{
            $user = $request->session()->get("user");
        }

        if ($user->id !== $ticket->user_id) {
            abort(403, 'Unauthorized access.');
        }

        if ($request->expectsJson()) {
            return responseJson($ticket, 200);
        }
        
        return view('tickets.user.show', compact('ticket'));
    }

    public function close(Request $request, Ticket $ticket) {
        
        if ($request->expectsJson()) {
            $user = getAuthUser($request);
        }else{
            $user = $request->session()->get("user");
        }

        if ($user->id !== $ticket->user_id) {
            abort(403, 'Unauthorized access.');
        }

        $ticket->update([
            'status' => 'closed',
            'closed_by' => auth('admin')->user() ? 'admin' : 'user',
        ]);

        if ($request->expectsJson()) {
            return responseJson(null, 200, 'Ticket closed successfully.');
        }

        return back()->with('status', 'Ticket closed successfully.');
    }
}
