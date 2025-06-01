<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();

        return view('categorypage', compact('books', 'categories'));
    }

    public function filter(Request $request)
    {
        $categoryId = $request->input('category');

        // Ambil semua kategori (untuk sidebar/menu kategori)
        $categories = Category::all();

        // Filter buku berdasarkan kategori yang dipilih
        $books = Book::when($categoryId, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();

        return view('categorypage', [
            'categories' => $categories,
            'books' => $books,
        ]);
    }

    public function home()
    {
        $books = Book::all();
        $categories = Category::all();

        return view('home', compact('books', 'categories'));
    }

    public function searchBooks(Request $request)
{
    $search = $request->input('search');
    $categories = Category::all();

    $books = Book::when($search, function ($query, $search) {
        return $query->where('title', 'like', '%' . $search . '%');
    })->get();

    return view('categorypage', compact('books', 'categories'));
}
}
