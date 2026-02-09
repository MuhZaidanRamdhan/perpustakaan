<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'stock',
        'ebook_file',
    ];
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}