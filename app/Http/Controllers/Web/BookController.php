<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function edit(Book $book) {
        return view('edit', compact('book'));
    }
}
