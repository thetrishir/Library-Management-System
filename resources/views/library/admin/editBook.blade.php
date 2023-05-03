@extends('library.master')
@section('title', 'Edit Book')
@section('body')
    {{-- <h1 class="text-center">Its Edit Page</h1> --}}
    <div class="container">
        <div class="row py-5">
            <div class="col-8">
                <form class="row g-3" action="{{ route('updateBook', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
                    </div>

                    <div class="col-md-6">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" class="form-control"
                            value="{{ $book->author }}">
                    </div>

                    <div class="col-md-6">
                        <label for="genre">Genre</label>
                        <input type="text" name="genre" id="genre" class="form-control"
                            value="{{ $book->genre }}">
                    </div>

                    <div class="col-md-6">
                        <label for="language">Language</label>
                        <select name="language" id="language" class="form-select" value="{{ $book->language }}">
                            <option selected>{{ $book->language }}</option>
                            <option value="English" {{ $book->language == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Bangla" {{ $book->language == 'Bangla' ? 'selected' : '' }}>Bangla</option>
                            <option value="Spanish" {{ $book->language == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                            <option value="French" {{ $book->language == 'French' ? 'selected' : '' }}>French</option>
                            <option value="German" {{ $book->language == 'German' ? 'selected' : '' }}>German</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="publish">Publication Date</label>
                        <input type="number" name="publish" id="publish" class="form-control"
                            value="{{ $book->publish }}">
                    </div>

                    <div class="col-md-6">
                        <label for="publisher">Publisher</label>
                        <input type="text" name="publisher" id="publisher" class="form-control"
                            value="{{ $book->publisher }}">
                    </div>

                    <div class="col-md-6">
                        <label for="pages">Pages</label>
                        <input type="number" name="pages" id="pages" class="form-control"
                            value="{{ $book->pages }}">
                    </div>

                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01"
                            value="{{ $book->price }}">
                    </div>

                    <div class="col-auto pt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
