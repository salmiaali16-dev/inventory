<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Mengambil buku beserta data genrenya
        return response()->json(Book::with('genre')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
            'genre_id' => 'required|exists:genres,id'
        ]);

        $book = Book::create($data);
        return response()->json($book, 201);
    }

    public function show(Book $book)
    {
        return response()->json($book->load('genre'), 200);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}