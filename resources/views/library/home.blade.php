@extends('library.master')
@section('title', 'Home')
@section('body')
    {{-- <h1 class="text-center">Its home though</h1> --}}
    <div class="container">
        <div class="row">
            <h1 class="text-center py-3">The Library</h1>
            @if (Session::get('notification'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('notification') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-3 my-3">
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
                                    <a href="{{ route('buyBook', $book->id) }}"
                                        class="btn btn-success rounded-pill me-2">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{-- <div class="col-sm-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Language</th>
                            <th>publish</th>
                            <th>Publisher</th>
                            <th>Pages</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->genre }}</td>
                                <td>{{ $book->language }}</td>
                                <td>{{ $book->publish }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> --}}
        </div>
    </div>

@endsection
