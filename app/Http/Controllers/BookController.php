<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // $request->session()->flush();
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Create Book Successfull');
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('books.edit', [
            'book' => $book,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }


        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('books')->with('status', 'Updated Boook Successfull');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('books.delete-book', [
            'book' => $book
        ]);
    }

    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Delete Book Successfull');
    }

    public function deleted()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('books.deleted-list', [
            'deletedBooks' => $deletedBooks
        ]);
    }

    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Restore Book Successfull');
    }
}
