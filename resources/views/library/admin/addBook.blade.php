@extends('library.master')
@section('title', 'Add Book')
@section('body')
    {{-- <h1 class="text-center">Its home though</h1> --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-auto">
                {{-- <form class="d-flex py-3" role="search" method="get" action="{{ route('searchBook') }}">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search Book"
                        aria-label="Search">
                    <button class="btn btn-danger" type="submit">Search</button>
                </form> --}}
                <h1 class="text-center">Add Book</h1>
                @if (Session::get('notification'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('notification') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="row g-3" action="{{ route('addedBook') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <label for="title" class="">Book Title</label>
                        <input name="title" type="text" class="form-control" placeholder="To Kill a Mockingbird">
                    </div>
                    <div class="col-md-4">
                        <label for="author" class="">Author</label>
                        <input name="author" type="text" class="form-control" placeholder="Harper Lee">
                    </div>
                    <div class="col-md-4">
                        <label for="genre" class="">Genre</label>
                        <input name="genre" type="text" class="form-control" placeholder="Classic">
                    </div>
                    <div class="col-md-4">
                        <label for="language" class="">Select Language</label>
                        <select class="form-select" aria-label="Default select example" name="language">
                            {{-- <option selected>Select Language</option> --}}
                            <option value="English" selected>English</option>
                            <option value="Bangla">Bangla</option>
                            <option value="Spanish">Spanish</option>
                            <option value="French">French</option>
                            <option value="German">German</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="publish" class="">Publish Year</label>
                        <input name="publish" type="number" class="form-control" placeholder="1960">
                    </div>
                    <div class="col-md-4">
                        <label for="publisher" class="">Publisher</label>
                        <input name="publisher" type="text" class="form-control" placeholder="J. B. Lippincott & Co.">
                    </div>
                    <div class="col-md-4">
                        <label for="pages" class="">Page Number</label>
                        <input name="pages" type="number" class="form-control" placeholder="336" step="1">
                    </div>
                    <div class="col-md-4">
                        <label for="price" class="">Price</label>
                        <input name="price" type="number" class="form-control" placeholder="$24.99" step="0.01">
                    </div>
                    <div class="col-md-4">
                        <label for="image" class="">Choose Image</label>
                        <input name="image" class="form-control" type="file" id="image">
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary rounded-pill mb-3">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-sm-auto py-5">
                <h1 class="text-center">The Library</h1>
                {{-- <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Language</th>
                            <th>Pubished</th>
                            <th>Publisher</th>
                            <th>Pages</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->genre }}</td>
                                <td>{{ $book->language }}</td>
                                <td>{{ $book->publish }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->price }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('editBook', $book->id) }}"
                                        class="btn btn-success rounded-pill me-2">Edit</a>
                                    <a href="{{ route('deleteBook', $book->id) }}"
                                        class="btn btn-danger rounded-pill">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}

                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-md-3 my-2">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('assets/image/' . $book->image) }}" class="card-img-top mx-auto"
                                    alt="Image" style="height: 200px;width:150px;">
                                <div class="card-body mx-auto">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                                    <p class="card-text">
                                        <strong>Genre: </strong> {{ $book->genre }}<br>
                                        <strong>Language: </strong> {{ $book->language }}<br>
                                        <strong>Publish: </strong> {{ $book->publish }}<br>
                                        <strong>Publisher: </strong> {{ $book->publisher ?: 'N/A' }}<br>
                                        <strong>Pages: </strong> {{ $book->pages }}<br>
                                        <strong>Price: </strong> ${{ number_format($book->price, 2) }}
                                    </p>
                                    <div class="d-flex">
                                        <a href="{{ route('editBook', $book->id) }}"
                                            class="btn btn-success rounded-pill me-2">Edit</a>
                                        <a href="{{ route('deleteBook', $book->id) }}"
                                            class="btn btn-danger rounded-pill">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
