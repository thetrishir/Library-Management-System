@extends('library.master')
@section('title', 'Buy Book')
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalQuantity = 0;
                        $totalPrice = 0; ?>
                        @foreach ($buys as $buy)
                            @if ($buy->user_name == Auth::user()->name)
                                <tr>
                                    <td>{{ $buy->book_name }}</td>
                                    <td>{{ $buy->author }}</td>
                                    <td>{{ $buy->quantity }}</td>
                                    <?php $totalQuantity += $buy->quantity; ?>
                                    <td>{{ $buy->price }}</td>
                                    <?php $totalPrice += $buy->price; ?>
                                    <td>{{ $buy->created_at }}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td><strong>Total</strong></td>
                            <td> </td>
                            <td>{{ $totalQuantity }}</td>
                            <td>{{ $totalPrice }}</td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
