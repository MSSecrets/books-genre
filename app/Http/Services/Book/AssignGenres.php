<?php

namespace App\Http\Services\Book;

use App\Models\Book;

class AssignGenres
{
    public function __invoke(array $data, Book $book): Book
    {
        $book->genres()->attach($data['genre_ids']);

        return $book;
    }
}
