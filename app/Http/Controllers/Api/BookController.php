<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Book\DestroyRequest;
use App\Http\Requests\Book\IndexRequest;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Http\Services\Book\Destroy;
use App\Http\Services\Book\Index;
use App\Http\Services\Book\Store;
use App\Http\Services\Book\Update;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\AssignGenresRequest;
use App\Http\Services\Book\AssignGenres;
use Throwable;

class BookController extends Controller
{
    public function index(IndexRequest $request, Index $index)
    {
        return response()->json([
            'message' => 'Successfully fetched the books.',
            'data' => $index($request->search, $request->page)
        ]);
    }

    public function store(StoreRequest $request, Store $store)
    {
        $book = $store($request->validated());

         return response()->json([
            'message' => 'Successfully stored the book.',
            'data' => $book
        ]);
    }

    public function update(UpdateRequest $request, Update $update, Book $book)
    {
        $updatedBook = $update($request->validated(), $book);

        return response()->json([
            'message' => 'Successfully updated the book.',
            'data' => $updatedBook
        ]);
    }

    public function destroy(DestroyRequest $request, Destroy $destroy, Book $book)
    {
        $destroy($book);

        return response()->json([
            'message' => 'Successfully deleted the book.',
        ]);
    }

    public function assignGenres(AssignGenresRequest $request, AssignGenres $assignGenres, Book $book)
    {
        $book = $assignGenres($request->validated(), $book);

        $book->load('genres');

        return response()->json([
            'message' => 'Successfully assinged book genre.',
            'data' => $book
        ]);
    
    }
}
