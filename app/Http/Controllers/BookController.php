<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
            $request->validate([
                // 'role' => 'nullable|string|max:255',
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
    
            Book::create($request->all());
            return redirect()->route('books.index')->with('success', 'Book added successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized action. Please log in.');
        }
    
        $user = Auth::user(); // Get the authenticated user
        if (!$user || !$user->isAdmin()) { // Ensure the method exists
            abort(403, 'Unauthorized action. Admins only.');
        }
    
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
    
}