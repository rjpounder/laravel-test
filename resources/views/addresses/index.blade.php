@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('addresses.create', $contact) }}" class="btn btn-success">Add new</a>
                            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-danger">Go Back to Contact</a>
                        </div>
                        <h2>
                            Addresses
                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address Line 1</th>
                                <th>Address Line 2</th>
                                <th>City</th>
                                <th>Town</th>
                                <th>Postal Code</th>
                                <th>Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <td>{{ $address->id }}</td>
                                    <td>{{ $address->name }}</td>
                                    <td>{{ $address->address_line_1 }}</td>
                                    <td>{{ $address->address_line_2 }}</td>
                                    <td>{{ $address->city }}</td>
                                    <td>{{ $address->town }}</td>
                                    <td>{{ $address->zip_code }}</td>
                                    <td>{{ $address->country }}</td>
                                    <td><a href="{{ route('addresses.edit', $address) }}"
                                           class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $addresses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
