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
}
