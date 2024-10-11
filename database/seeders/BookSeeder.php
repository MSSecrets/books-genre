<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();

        $genres = Genre::all();

        Book::factory()
            ->count(15)
            ->create()
            ->each(function ($book) use ($genres) {
                $book->genres()->attach($genres->random(rand(1, 3)));
            });
    }
}
