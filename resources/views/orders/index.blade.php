@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('orders.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Orders
                        </h2>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Order ID
                                    <small><a href="{{route('orders', ['sortBy' => 'id', 'direction' => 'asc'])}}">asc</a>
                                        <a href="{{route('orders', ['sortBy' => 'id', 'direction' => 'desc'])}}">desc</a></small>
                                </th>
                                <th>Contact</th>
                                <th>Items #
                                    <small><a href="{{route('orders', ['sortBy' => 'items', 'direction' => 'asc'])}}">asc</a>
                                        <a href="{{route('orders', ['sortBy' => 'items', 'direction' => 'desc'])}}">desc</a></small>
                                </th>
                                <th>Total Price
                                    <small><a href="{{route('orders', ['sortBy' => 'total', 'direction' => 'asc'])}}">asc</a>
                                        <a href="{{route('orders', ['sortBy' => 'total', 'direction' => 'desc'])}}">desc</a></small>
                                </th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td><a href="{{route('contacts.edit', $order->contact->id)}}">{{ $order->contact->fullName }}</a></td>
                                    <td>{{ $order->order_items_count }}</td>
                                    <td>&pound; {{ $order->total_price }}</td>
                                    <td><a href="{{ route('orders.edit', $order) }}"
                                           class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
