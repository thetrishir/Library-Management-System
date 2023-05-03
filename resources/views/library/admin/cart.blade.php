@extends('library.master')
@section('title', 'Cart')
@section('body')

    <div class="container">
        <div class="row py-3">
            <div class="col-sm-auto">
                <h1 class="text-center">Cart</h1>

                @if (Session::get('notification'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('notification') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buys as $buy)
                            <tr>
                                <td>{{ $buy->user_name }}</td>
                                <td>{{ $buy->book_name }}</td>
                                <td>{{ $buy->author }}</td>
                                <td>{{ $buy->quantity }}</td>
                                <td>{{ $buy->price }}</td>
                                <td>{{ $buy->created_at }}</td>
                                <td>
                                    <a href="{{ route('deleteBuy', $buy->id) }}"
                                        class="btn btn-danger rounded-pill">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
