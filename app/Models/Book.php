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
        'category_id',
    ];
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}