<?php

namespace App\Http\Services\Book;

use App\Models\Book;

class Index
{
    public function __invoke($page = null)
    {
        return Book::paginate(5, ['*'], 'page', $page);
    }
}
