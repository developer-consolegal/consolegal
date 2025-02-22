<?php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->id);
        $documents = Document::with('user')->where("user_id", $request->id)->latest()->get();
        return view('user_documents', compact('documents', 'user'));
    }

    public function create()
    {
        $users = User::all(); // Get all users for selection
        return view('admin.documents.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'label' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:4096',
        ]);

        $file = $request->file('file');
        $filePath = time() . "_documents." . $file->extension();
        $file->move(public_path('storage'), $filePath);

        Document::create([
            'user_id' => $request->user_id,
            'user_type' => "App\\Models\\User",
            'label' => $request->label,
            'category' => $request->category,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Document uploaded successfully!');
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        $users = User::all();
        return view('admin.documents.edit', compact('document', 'users'));
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        $request->validate([
            'user_id' => 'required',
            'user_type' => "App\\Models\\User",
            'label' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:4096',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            // $filePath = $request->file('file')->store('documents', 'public');

            $file = $request->file('file');
            $filePath = time() . "_documents." . $file->extension();
            $file->move(public_path('storage'), $filePath);

            $document->file_path = $filePath;
        }

        $document->user_id = $request->user_id;
        $document->label = $request->label;
        $document->category = $request->category;
        $document->save();

        return redirect()->back()->with('success', 'Document updated successfully!');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully!');
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        return response()->download(public_path("storage/".$document->file_path));
    }
}
