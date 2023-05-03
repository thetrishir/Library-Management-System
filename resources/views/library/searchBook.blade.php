@extends('library.master')
@section('title', 'Search Book')
@section('body')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-auto">
                <form class="d-flex" role="search" action="">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search Book" aria-label="Search"
                        value="{{ $search }}">

                    <!-- Dropdown to select a filtering option -->
                    <select name="filter" class="form-select me-2">
                        <option value="">Filter By</option>
                        <option value="title" {{ $filter === 'title' ? 'selected' : '' }}>Title</option>
                        <option value="author" {{ $filter === 'author' ? 'selected' : '' }}>Author</option>
                        <option value="genre" {{ $filter === 'genre' ? 'selected' : '' }}>Genre</option>
                        <option value="language" {{ $filter === 'language' ? 'selected' : '' }}>Language</option>
                        <option value="publish" {{ $filter === 'publish' ? 'selected' : '' }}>Publication Date</option>
                        <option value="publisher" {{ $filter === 'publisher' ? 'selected' : '' }}>Publisher</option>
                        <option value="pages" {{ $filter === 'pages' ? 'selected' : '' }}>Pages</option>
                        <option value="price" {{ $filter === 'price' ? 'selected' : '' }}>Price</option>
                        {{-- <option value="status" {{ $filter === 'status' ? 'selected' : '' }}>Status</option> --}}
                    </select>

                    <button class="btn btn-danger me-2" type="submit">Search</button>

                    <!-- Reset button to clear search and filter inputs -->
                    <a href="{{ route('searchBook') }}" class="text-decoration-none">
                        <button class="btn btn-secondary" type="button">Reset</button>
                    </a>
                </form>

                <h1 class="text-center py-3">The Library</h1>

                <table class="table table-hover py-3">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Language</th>
                            <th>Publish</th>
                            <th>Publisher</th>
                            <th>Pages</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($book as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->genre }}</td>
                                <td>{{ $book->language }}</td>
                                <td>{{ $book->publish }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->price }}</td>
                                <td>
                                    <a href="{{ route('buyBook', $book->id) }}"
                                        class="btn btn-success rounded-pill me-2">Buy</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
