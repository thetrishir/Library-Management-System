@extends('library.master')
@section('title', 'Buy Book')
@section('body')
    {{-- <h1 class="text-center">Its Edit Page</h1> --}}
    <div class="container">
        <div class="row py-5">
            <div class="col-8">
                <form class="row g-3" action="{{ route('boughtBook', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="user_name">User Name</label>
                        <input type="text" name="user_name" id="user_name" class="form-control"
                            value="{{ $user }}">
                    </div>

                    <div class="col-md-6">
                        <label for="book_name">Book Name</label>
                        <input type="text" name="book_name" id="book_name" class="form-control"
                            value="{{ $book->title }}">
                    </div>

                    <div class="col-md-6">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" class="form-control"
                            value="{{ $book->author }}">
                    </div>

                    <div class="col-md-6">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" step="1"
                            value="1">
                    </div>

                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01"
                            value="{{ $book->price }}">
                    </div>

                    <div class="col-auto pt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <button type="submit" class="btn btn-primary">Buy</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
