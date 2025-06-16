<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // ✅ Import the trait

class NoteController extends Controller
{
    use AuthorizesRequests; // ✅ Enable the authorize() method

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Auth::user()->notes()->latest()->get();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Auth::user()->notes()->create($request->only('title', 'description'));

        return redirect()->route('dashboard')->with('success', 'Note created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note); // Authorization check
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $note->update($request->only('title', 'description'));

        return redirect()->route('dashboard')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();

        return redirect()->route('dashboard')->with('success', 'Note deleted successfully.');
    }
}
