<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('Category')->get();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $books = Book::all();

        $statuses = Book::select('status')->distinct()->pluck('status');
        return view('admin.books.create', compact('categories', 'books', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'string',
            'price' => 'numeric|required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images', $filename, 'public'); // simpan di storage/app/public/images
            $validated['cover_image'] = $filename; // simpan nama file ke database
        }


        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('details', compact('book'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'string',
            'price' => 'numeric|required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images', $filename, 'public');
            $validated['cover_image'] = $filename;
        }

        $book->update($validated);

      return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

       return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
