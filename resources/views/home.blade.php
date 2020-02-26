@extends('layouts.app')

@section('head')
    <style>
        .tasks li {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        Please work through the issues listed below. Try to group each solution into a separate commit
                        as best you can. For any new screens, there is no need to make them look pretty.
                    </p>
                    <ol class="tasks" style="list-style: decimal inside;">
                        <li>
                            When I try to <a href="{{ route('contacts.create') }}">create a contact</a> I receive an
                            error, can you fix this?
                        </li>
                        <li>
                            The <a href="{{ route('contacts') }}">contacts</a> page seems to be loading quite slowly.
                            Can you identify the issue and fix it?
                            <br>
                            <small>
                                (In the real world we would use pagination, but the page should still load quickly when
                                loading all records at once.)
                            </small>
                        </li>
                        <li>
                            The company status doesn't seem to be showing on the
                            <a href="{{ route('companies') }}">companies</a> page. Can you make it show?
                        </li>
                        <li>
                            We need to be able store addresses for contacts. Can you create the address resource
                            and allow for addresses to be associated with a contact? A contact can have many addresses.
                        </li>
                        <li>
                            We need to be able to store orders placed by companies. An order needs:
                            <ul>
                                <li>a unique order number</li>
                                <li>to store the particular contact from the company that placed the order</li>
                                <li>
                                    to allow for many order items. Each order item should contain a product name and a
                                    price
                                </li>
                            </ul>
                            Can you create the resources and screens to allow orders to be entered? We'll also
                            need a link adding to the top bar which will take the user to an index of all orders.
                        </li>
                        <li>
                            Can you add two buttons to the order index screen to change the sorting? The first should
                            sort by the number of items in the order. The second should sort by the total monetary value
                            of the order.
                        </li>
                        <li>
                            Can you have the system send an email whenever an order is created? The email should be sent
                            to info@pretendcompany.com and be CC'd to accounts@pretendcompany.com. The content of the
                            email can be plain text, but should include all the details about the order and its items.
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
