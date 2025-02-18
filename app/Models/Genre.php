<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;

class Genre extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
    ];

    protected $guarded = [];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class)
            ->withTimestamps();
    }

}
