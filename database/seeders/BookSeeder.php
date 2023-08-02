<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        Book::factory()->times(100)->create();
=======
        Book::factory()->times(20)->create();
>>>>>>> Tugas-Dewa/main
    }
}
