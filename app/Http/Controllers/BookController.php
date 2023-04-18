<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\BookServiceInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(private BookServiceInterface $bookService)
    {

    }

    public function listBooks(Request $request)
    {
        return response()->json(['data' => $this->bookService->bookListing($request)]);
    }

    public function retrieveBookDetail($bookById)
    {
        return response()->json(['detail' => $this->bookService->find($bookById)]);
    }

    public function store(Request $request)
    {
        $this->bookService->create($request->only('title', 'author', 'description', 'genre', 'image', 'isbn', 'published_on', 'publisher'));
        return response()->json(['data' => []]);
    }

    public function edit($bookById, Request $request)
    {
        $book = $this->bookService->find($bookById);
        if (empty((array) $book)) {
            return response()->json(['error' => trans('book.error.not_found')], 422);
        }

        $this->bookService->update($bookById, $request->only('title', 'author', 'description', 'genre', 'image', 'isbn', 'published_on', 'publisher'));
        return response()->json(['data' => []]);
    }

    public function delete($bookById)
    {
        $this->bookService->delete($bookById);
        return response()->json(['data' => []]);
    }
}
