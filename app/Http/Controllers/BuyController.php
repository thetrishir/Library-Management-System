<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Buy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $user = Auth::user()->name;
        $book = Book::find($id);
        return view('library.user.buyBook', ['book' => $book, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buys = new Buy;
        $user = Auth::user()->name;
        $buys->user_name = $request->user_name;
        $buys->book_name = $request->book_name;
        $buys->author = $request->author;
        $buys->quantity = $request->quantity;
        $buys->price = $request->price * $request->quantity;
        $buys->save();
        return redirect(route('cartBook', $user))->with('notification', 'Book added to your cart');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $buy = Buy::all();

        if (Auth::user()->role == 'admin') {
            return view('library.admin.cart', ['buys' => $buy])->with('notification', 'Book added to your cart');
        } else {
            return view('library.user.cart', ['buys' => $buy])->with('notification', 'Book added to your cart');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buy::destroy($id);
        return redirect(route('cartBook'))->with('notification', 'Deleted Successfully');
    }
}
