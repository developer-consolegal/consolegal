<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AgentMessageController extends Controller
{
    public function store(Request $request, Ticket $ticket) {
        $request->validate([
            'message' => 'nullable|string',
            'attachment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $request->session()->get("agents");

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
            'sender_type' => 'App\\Models\\agents_model',
            'message' => $request->message,
            'attachment' => $attachmentPath,
        ]);

        return back();
    }
}
