<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\BookSeeder;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_index_displays_books_list(): void
    {
        $this->seed(BookSeeder::class);

        $response = $this->get('/books');

        $response->assertStatus(200);
        $response->assertSee('Pemrograman Web Lanjut dengan Laravel');
        $response->assertSee('Belajar Eloquent ORM');
        $response->assertSee('Mastering Database Migration');
    }

    public function test_books_create_page_loads(): void
    {
        $response = $this->get('/books/create');

        $response->assertStatus(200);
        $response->assertSee('Tambah Buku Baru');
    }

    public function test_store_creates_new_book_with_valid_data(): void
    {
        $response = $this->post('/books', [
            'title' => 'Buku Baru Test',
            'author' => 'Penulis Test',
            'year' => 2025,
        ]);

        $response->assertRedirect('/books');
        $response->assertSessionHas('success', 'Buku berhasil ditambahkan!');
        $this->assertDatabaseHas('books', [
            'title' => 'Buku Baru Test',
            'author' => 'Penulis Test',
            'year' => 2025,
        ]);
    }

    public function test_store_fails_with_invalid_data(): void
    {
        $response = $this->post('/books', [
            'title' => '',
            'author' => '',
            'year' => 'invalid_year',
        ]);

        $response->assertSessionHasErrors(['title', 'author', 'year']);
        $this->assertDatabaseCount('books', 0);
    }

    public function test_books_show_displays_single_book_details(): void
    {
        $book = Book::create([
            'title' => 'Buku Detail Test',
            'author' => 'Penulis Detail',
            'year' => 2023,
        ]);

        $response = $this->get("/books/{$book->id}");

        $response->assertStatus(200);
        $response->assertSee('Buku Detail Test');
        $response->assertSee('Penulis Detail');
    }

    public function test_books_edit_page_loads_with_existing_data(): void
    {
        $book = Book::create([
            'title' => 'Buku Edit Test',
            'author' => 'Penulis Edit',
            'year' => 2021,
        ]);

        $response = $this->get("/books/{$book->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Buku Edit Test');
        $response->assertSee('Penulis Edit');
    }

    public function test_update_modifies_existing_book(): void
    {
        $book = Book::create([
            'title' => 'Buku Asli',
            'author' => 'Penulis Asli',
            'year' => 2020,
        ]);

        $response = $this->put("/books/{$book->id}", [
            'title' => 'Buku Diperbarui',
            'author' => 'Penulis Diperbarui',
            'year' => 2024,
        ]);

        $response->assertRedirect('/books');
        $response->assertSessionHas('success', 'Buku berhasil diperbarui!');
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Buku Diperbarui',
            'author' => 'Penulis Diperbarui',
            'year' => 2024,
        ]);
    }

    public function test_destroy_deletes_book(): void
    {
        $book = Book::create([
            'title' => 'Buku Dihapus',
            'author' => 'Penulis Dihapus',
            'year' => 2019,
        ]);

        $response = $this->delete("/books/{$book->id}");

        $response->assertRedirect('/books');
        $response->assertSessionHas('success', 'Buku berhasil dihapus!');
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
