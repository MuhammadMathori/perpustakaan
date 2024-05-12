<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Create Category Successfull');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Update Category Successfull');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categories.delete-category', [
            'category' => $category
        ]);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Delete Category Successfull');
    }

    public function deleted()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('categories.deleted-list', [
            'deletedCategories' => $deletedCategories
        ]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Restore Category Successfull');
    }
}
