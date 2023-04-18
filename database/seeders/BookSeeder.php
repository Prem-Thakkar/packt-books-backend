<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiResponse = Http::get('https://fakerapi.it/api/v1/books?_quantity=100');
        $books = $apiResponse->json()['data'];
        foreach ($books as $i => $book) {
            $books[$i]['published_on'] = $books[$i]['published'];
            $books[$i]['created_at'] = now();
            $books[$i]['updated_at'] = now();
            unset($books[$i]['published']);
        }

        Book::insert($books);
    }
}
