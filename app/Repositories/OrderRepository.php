<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    /**
     * Orders to be returned
     * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private $orders;

    /**
     * Options for sort by
     * @var array
     */
    public $sortByOptions = [
        'id',
        'total',
        'items'
    ];

    /**
     * @var string
     */
    private $direction = 'desc';

    /**
     * @var string
     */
    private $sortBy = 'id';

    /**
     * @var int|mixed
     */
    private $limit = 15;

    public function __construct($sortBy = 'id', $descending = true, $limit = 15)
    {
        $this->direction = $descending === true ? 'desc' : 'asc';
        $this->limit = $limit;
        $this->sortBy = $sortBy;
    }

    public function get()
    {
        if ((!$this->sortBy || !in_array($this->sortBy, $this->sortByOptions))) {
            $this->orders = Order::paginate($this->limit);
        } else {
            $this->{'sortBy'.ucwords($this->sortBy)}();
        }
        return $this->orders;
    }

    private function sortById()
    {
        $this->orders = Order::withCount('orderItems')->with('contact')->orderBy('id', $this->direction)->paginate($this->limit);
    }

    private function sortByTotal()
    {
        $ordersOrdered = Order::get()->sortBy('total_price')->pluck('id')->toArray();
        if($this->direction === 'desc'){
            $ordersOrdered = array_reverse($ordersOrdered);
        }
        $ordersOrdered = implode(',', $ordersOrdered);
        $this->rawSorter($ordersOrdered);
    }

    private function sortByItems()
    {
        $ordersOrdered = Order::withCount('orderItems')->get()->sortBy('order_items_count')->pluck('id')->toArray();
        if($this->direction === 'desc'){
            $ordersOrdered = array_reverse($ordersOrdered);
        }
        $ordersOrdered = implode(',', $ordersOrdered);
        $this->rawSorter($ordersOrdered);
    }

    private function rawSorter($ordersOrdered)
    {
        $this->orders = Order::withCount('orderItems')->with('contact')
            ->orderByRaw(\DB::raw("FIELD(id, ".$ordersOrdered." )"))
            ->paginate($this->limit);
    }
}
