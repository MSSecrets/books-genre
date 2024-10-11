<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\BookController;
use App\Http\Requests\Book\UpdateRequest;
use App\Http\Services\Book\Update;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Testing\Fakes\Fake;

class ApiBookControllerTest extends TestCase
{
    use WithFaker;

    public function test_update_method(): void
    {

    }
}
