<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pemrograman Web Lanjut dengan Laravel',
            'author' => 'Budi Raharjo',
            'year' => 2023,
        ]);

        Book::create([
            'title' => 'Belajar Eloquent ORM',
            'author' => 'Siti Aminah',
            'year' => 2022,
        ]);

        Book::create([
            'title' => 'Mastering Database Migration',
            'author' => 'Eko Kurniawan',
            'year' => 2024,
        ]);
    }
}
