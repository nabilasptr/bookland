<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        $categories = Category::all();

        if ($request->expectsJson()) {
            return response()->json([
                'books' => $books,
                'categories' => $categories,
            ]);
        }

        return view('categorypage', compact('books', 'categories'));
    }

    public function filter(Request $request)
    {
        $categoryId = $request->input('category');

        $categories = Category::all();

        $books = Book::when($categoryId, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();

        if ($request->expectsJson()) {
            return response()->json([
                'categories' => $categories,
                'books' => $books,
            ]);
        }

        return view('categorypage', [
            'categories' => $categories,
            'books' => $books,
        ]);
    }

    public function home(Request $request)
    {
        $books = Book::all();
        $categories = Category::all();

        if ($request->expectsJson()) {
            return response()->json([
                'books' => $books,
                'categories' => $categories,
            ]);
        }

        return view('home', compact('books', 'categories'));
    }

    public function searchBooks(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::all();

        $books = Book::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->get();

        if ($request->expectsJson()) {
            return response()->json([
                'books' => $books,
                'categories' => $categories,
            ]);
        }

        return view('categorypage', compact('books', 'categories'));
    }

    public function newRelease(Request $request)
    {
        $categories = Category::all();
        $books = Book::where('status', 'new_release')->latest()->get();

        if ($request->expectsJson()) {
            return response()->json([
                'categories' => $categories,
                'books' => $books,
                'status' => 'new_release',
            ]);
        }

        return view('categorypage', [
            'categories' => $categories,
            'books' => $books,
            'status' => 'new_release'
        ]);
    }
}
