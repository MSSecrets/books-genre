<?php

namespace App\Http\Services\Book;

use App\Models\Book;

class Index
{
    public function __invoke(string $search = null, int $page = null)
    {
        $books = Book::query();

        // @todo: implement advance search?
        if ($search) {
            $books->where('title', 'like', '%' . $search . '%');
        }

        return $books->paginate(5, ['*'], 'page', $page);
    }
}
