@foreach($order->orderItems as $item)
    <p>Item: {{$item->name}}</p>
    <p> Price: {{$item->price}}</p>
@endforeach

<p>Order for {{$order->contact->fullName}}<p>
