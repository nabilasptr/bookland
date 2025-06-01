<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle($bookId)
    {
        $user = Auth::user();

        $book = Book::findOrFail($bookId); // validasi: kalau tidak ada, akan 404

        if ($user->favorites()->where('book_id', $book->id)->exists()) {
            $user->favorites()->detach($book->id);
        } else {
            $user->favorites()->attach($book->id);
        }

        return back();
    }

    public function index()
    {
        $user = auth()->user();
        // Ambil buku yang difavoritkan user, asumsi relasi favorites di User model sudah benar
        $books = $user->favorites()->get();

        return view('favorite.index', compact('books'));
    }


}