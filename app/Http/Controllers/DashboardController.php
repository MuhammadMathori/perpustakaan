<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $rentLogs = RentLogs::with(['user', 'book'])->get();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('dashboard.admin.index', [
            'book_count' => $bookCount,
            'category_count' => $categoryCount,
            'user_count' => $userCount,
            'rentLogs' => $rentLogs
        ]);
    }
}
