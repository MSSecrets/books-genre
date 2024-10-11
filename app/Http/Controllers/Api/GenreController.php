<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\Genre\Store;
use App\Http\Requests\Genre\StoreRequest;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function store(StoreRequest $request, Store $store)
    {
        $book = $store($request->validated());

         return response()->json([
            'message' => 'Successfully stored the genre.',
            'data' => $book
        ]);
    }
    
}
