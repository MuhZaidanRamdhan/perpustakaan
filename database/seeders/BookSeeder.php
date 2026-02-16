<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fiksi = Categories::where('name', 'Fiksi')->first();
        $nonFiksi = Categories::where('name', 'Non Fiksi')->first();

        Book::insert([

            // ================= FIKSI =================
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'stock' => 4,
                'category_id' => $fiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'stock' => 3,
                'category_id' => $fiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Harry Potter',
                'author' => 'J.K. Rowling',
                'stock' => 6,
                'category_id' => $fiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'stock' => 5,
                'category_id' => $fiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dilan 1990',
                'author' => 'Pidi Baiq',
                'stock' => 7,
                'category_id' => $fiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ================= NON FIKSI =================
            [
                'title' => 'Laravel Dasar',
                'author' => 'Taylor Otwell',
                'stock' => 3,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'stock' => 5,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'stock' => 4,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Deep Work',
                'author' => 'Cal Newport',
                'stock' => 3,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Psychology of Money',
                'author' => 'Morgan Housel',
                'stock' => 6,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pemrograman Web',
                'author' => 'W3 School',
                'stock' => 5,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Belajar JavaScript',
                'author' => 'Eloquent JS',
                'stock' => 4,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Database Design',
                'author' => 'Elmasri & Navathe',
                'stock' => 2,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UI/UX Fundamentals',
                'author' => 'Don Norman',
                'stock' => 3,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Manajemen Proyek IT',
                'author' => 'PMI',
                'stock' => 5,
                'category_id' => $nonFiksi->id,
                'ebook_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
