<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use App\Models\Contact;
use App\Models\Order;
use Illuminate\Http\Response;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    /**
     * @param string $sortBy
     * @param string $direction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($sortBy = 'id', $direction = 'asc')
    {
        $sortBy = strtolower($sortBy);
        $direction = strtolower($direction);
        $orders = (new OrderRepository($sortBy, $direction === 'asc' ? false : true))->get();
        return view('orders.index', compact('orders', 'sortBy', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Contact $contact
     * @return void
     */
    public function create(Contact $contact)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrder $request
     * @param Contact $contact
     * @return void
     */
    public function store(CreateOrder $request, Contact $contact)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrder  $request
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function update(UpdateOrder $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
