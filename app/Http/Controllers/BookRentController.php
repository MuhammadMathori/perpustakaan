<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('dashboard.admin.book-rent', [
            'users' => $users,
            'books' => $books
        ]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(7)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');
        if ($book['status'] != 'in stock') {
            Session::flash('status', 'Buku sedang dipinjam');
            Session::flash('alert', 'alert-danger');
            return redirect('bookRent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('status', 'Kamu sudah mencapai batas maksimal peminjaman buku');
                Session::flash('alert', 'alert-danger');
                return redirect('bookRent');
            } else {
                try {
                    DB::beginTransaction();
                    //proses memasukkan data ke rent_log table
                    RentLogs::create($request->all());
                    //proses update status buku
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not stock';
                    $book->save();
                    DB::commit();

                    Session::flash('status', 'Buku Berhasil dipinjam');
                    Session::flash('alert', 'alert-success');
                    return redirect('bookRent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function bookReturn()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('dashboard.admin.book-return', [
            'users' => $users,
            'books' => $books
        ]);
    }
    public function bookReturnProcess(Request $request)
    {
        // Check if the user and book to be returned are valid
        $rent = RentLogs::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->whereNull('actual_return_date');

        $countData = $rent->count();

        if ($countData == 1) {
            // Update the actual return date and book status
            $rent->update(['actual_return_date' => Carbon::now()->toDateString()]);
            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();

            // Return success message
            Session::flash('status', 'Buku Berhasil dikembalikan');
            Session::flash('alert', 'alert-success');
            return redirect('bookReturn');
        } else {
            // Return error message
            Session::flash('status', 'Gagal mengembalikan buku');
            Session::flash('alert', 'alert-danger');
            return redirect('bookReturn');
        }
    }
}
