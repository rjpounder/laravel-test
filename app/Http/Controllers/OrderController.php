<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use App\Models\Company;
use App\Models\CompanyStatus;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
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
     * @param Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $order = new Order;

        $activeContacts = Contact::whereHas('company', function ($query) {
            return $query->whereHas('companyStatus',function($cs){
                return $cs->where('name', 'Active');
            });
        })->get();

        return view('orders.create', compact('order', 'activeContacts'));
    }

    /**
     * @param CreateOrder $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(CreateOrder $request)
    {
        $order = new Order;

        $contact = Contact::whereId($request->contact_id)->first();

        $orderItems = [];
        foreach($request->orderitem as $orderItem){
            $orderItems[] = new OrderItem([
                'name' => $orderItem['name'],
                'price' => $orderItem['price'],
            ]);
        }

        \DB::transaction(function() use ($order, $orderItems, $contact) {
            $order->contact()->associate($contact);
            $order->save();
            $order->orderItems()->delete();
            $order->orderItems()->saveMany($orderItems);
        });

        event(new OrderCreated($order, $request->user()));

        return redirect('orders')->with('alert', 'Order created!');
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
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order)
    {
        $originalContact = $order->contact()->get();
        $activeContacts = Contact::whereHas('company', function ($query) {
            return $query->whereHas('companyStatus',function($cs){
                return $cs->where('name', 'Active');
            });
        })->get();

        $activeContacts = $originalContact->merge($activeContacts);

        return view('orders.edit', compact('order', 'activeContacts'));
    }

    /**
     * @param UpdateOrder $request
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateOrder $request, Order $order)
    {
        $orderItems = [];
        foreach($request->orderitem as $orderItem){
            $orderItems[] = new OrderItem([
                'name' => $orderItem['name'],
                'price' => $orderItem['price'],
            ]);
        }

        $order->contact_id = Contact::whereId($request->contact_id)->first()['id'];

        \DB::transaction(function() use ($order, $orderItems) {
            $order->orderItems()->delete();
            $order->orderItems()->saveMany($orderItems);
            $order->save();
        });

        return redirect('orders')->with('alert', 'Order updated!');
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
