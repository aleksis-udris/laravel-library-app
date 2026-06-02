<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;

class BookController extends Controller
{
    public function publicIndex()
    {
        $books = Book::all();
        return view('books.publicIndex', compact('books'));
    }

    public function editorIndex()
    {
        $books = Book::all();
        return view('books.editorIndex', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'ISBN' => 'required|string|unique:books,ISBN',
            'available_copies' => 'required|integer|min:0',
        ]);

        $book = Book::create($validated);

        return redirect()->route('books.editorIndex')->with('success', 'Book created successfully');
    }

    public function show($id, $origin)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return view('books.show', compact('book', 'origin'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'ISBN' => 'sometimes|required|string|unique:books,ISBN,' . $id,
            'available_copies' => 'sometimes|required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.editorIndex')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return redirect()->route('books.editorIndex')->with('success', 'Book deleted successfully');
    }
}
