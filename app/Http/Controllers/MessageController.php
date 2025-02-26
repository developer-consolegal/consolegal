<?php
// app/Http/Controllers/MessageController.php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, Ticket $ticket) {
        $request->validate([
            'message' => 'nullable|string',
            'attachment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->expectsJson()) {
            $user = getAuthUser($request);
        }else{
            $user = $request->session()->get("user");
        }

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
            return responseJson(null, 200);
        }

        return back();
    }
}
