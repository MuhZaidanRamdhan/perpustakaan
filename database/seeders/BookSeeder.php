<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::insert([
            [
                'title' => 'Laravel Dasar',
                'author' => 'Taylor Otwell',
                'stock' => 3,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pemrograman Web',
                'author' => 'W3 School',
                'stock' => 5,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
