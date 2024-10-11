<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::each(function ($book) {
            $book->genres()->detach();
        });

        Genre::truncate();

        Genre::factory()
            ->count(5)
            ->create();
    }
}
