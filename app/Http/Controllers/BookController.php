<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('library.home', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $books = Book::all();
        return view('library.admin.addBook', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->language = $request->language;
        $book->publish = $request->publish;
        $book->publisher = $request->publisher;
        $book->pages = $request->pages;
        $book->price = $request->price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/image', $filename);
            $book->image = $filename;
        }
        $book->save();
        return redirect(route('addBook'))->with('notification', 'Added Successfully');
        // return $book->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $search = $request['search'] ?? "";
        // if ($search != "") {
        //     $book = Book::where('title', 'LIKE', "%$search%")->get();
        // } else {
        //     $book = Book::all();
        // }
        // return view('searchBook', ['book' => $book, 'search' => $search]);
        $search = $request->input('search');
        $filter = $request->input('filter');

        switch ($filter) {
            case 'title':
                $book = Book::where('title', 'LIKE', "%$search%")->get();
                break;

            case 'author':
                $book = Book::where('author', 'LIKE', "%$search%")->get();
                break;

            case 'genre':
                $book = Book::where('genre', 'LIKE', "%$search%")->get();
                break;

            case 'language':
                $book = Book::where('language', 'LIKE', "%$search%")->get();
                break;

            case 'publish':
                $book = Book::where('publish', 'LIKE', "%$search%")->get();
                break;

            case 'publisher':
                $book = Book::where('publisher', 'LIKE', "%$search%")->get();
                break;

            case 'pages':
                $book = Book::where('pages', 'LIKE', "%$search%")->get();
                break;

            case 'price':
                $book = Book::where('price', 'LIKE', "%$search%")->get();
                break;

            default:
                $book = Book::where('title', 'LIKE', "%$search%")
                    ->orWhere('author', 'LIKE', "%$search%")
                    ->orWhere('genre', 'LIKE', "%$search%")
                    ->orWhere('language', 'LIKE', "%$search%")
                    ->orWhere('publish', 'LIKE', "%$search%")
                    ->orWhere('publisher', 'LIKE', "%$search%")
                    ->orWhere('pages', 'LIKE', "%$search%")
                    ->orWhere('price', 'LIKE', "%$search%")
                    ->get();
        }

        if (Auth::user()->role == 'admin') {
            return view('library.admin.searchBook', [
                'book' => $book,
                'search' => $search,
                'filter' => $filter
            ]);
        } elseif (Auth::user()->role == 'user') {
            return view('library.searchBook', [
                'book' => $book,
                'search' => $search,
                'filter' => $filter
            ]);
        } else {
            return view('library.searchBook', [
                'book' => $book,
                'search' => $search,
                'filter' => $filter
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('library.admin.editBook', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->language = $request->language;
        $book->publish = $request->publish;
        $book->publisher = $request->publisher;
        $book->pages = $request->pages;
        $book->price = $request->price;
        $book->save();
        return redirect(route('home'))->with('notification', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect(route('addBook'))->with('notification', 'Deleted Successfully');
    }
}
