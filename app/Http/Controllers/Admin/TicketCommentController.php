<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\TicketComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketCommentController extends Controller
{

    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            "ticket_id" => "integer|required",
            "comment" => "required|string",
            'attachments' => 'nullable'
        ]);
        try {
            $ticket = SupportTicket::findOrFail($request->ticket_id);
            $attachments = [];
            if ($request->hasFile("attachments")) {
                foreach ($request->file("attachments") as $file) {
                    $path = $file->store("ticket_attachments/{$ticket->ticket_number}", "public");
                    $attachments[] = [
                        "filename" => $file->getClientOriginalName(),
                        "path" => $path,
                        "size" => $file->getSize(),
                        "mime_type" => $file->getClientMimeType(),
                    ];
                }
            }

            $ticket->update([
                "status" => "pending",
                "last_replied_by" => auth()->id(),
                "last_replied_at" => now()
            ]);

            TicketComment::create([
                "ticket_id" => $ticket->id,
                "user_id" => auth()->id(),
                "comment" => $request->input("comment"),
                "attachments" => $attachments,
                "type_user" => "admin"
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Comment added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while adding the comment. Please try again. Error: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $comment = TicketComment::findOrFail($id);

            if ($comment->attachments) {
                foreach ($comment->attachments as $attachment) {
                    if (file_exists(storage_path("app/{$attachment['path']}"))) {
                        unlink(storage_path("app/{$attachment['path']}"));
                    }
                }
            }

            $comment->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while deleting the comment. Please try again. Error: ' . $e->getMessage());
        }
    }
}