{{ csrf_field() }}
<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Customer</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($activeContacts as $contact)
                <option value="{{ $contact->id }}"
                    {{ $contact->id == old('contact_id', $order->contact->id ?? null) ? ' selected' : ''}}>
                    {{ $contact->fullName }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('contact_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div id="order-items-container">
@if($order->orderItems->count() > 0)
    @foreach($order->orderItems as $orderItem)
        <div id="order-items-{{$loop->index}}" class="form-group{{ $errors->has('orderitem.'.($loop->index).'.name') || $errors->has('orderitem.'.($loop->index).'.price') ? ' has-error' : '' }}">
            <div class="row">
                <label for="name-{{($loop->index)}}" class="col-md-4 control-label">Item {{($loop->index)}} Name</label>
                <div class="col-md-8">
                    <input id="name-{{($loop->index)}}" type="text" class="form-control" name="orderitem[{{($loop->index)}}][name]"
                           value="{{ old('orderitem.'.($loop->index).'.name', $orderItem->name) }}">
                    @if ($errors->has('orderitem.'.($loop->index).'.name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orderitem.'.($loop->index).'.name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <label for="price-{{($loop->index)}}" class="col-md-4 control-label">Item {{($loop->index)}} Price</label>
                <div class="col-md-8">
                    <input id="price-{{($loop->index)}}" type="number" class="form-control" name="orderitem[{{($loop->index)}}][price]"
                           value="{{ old('orderitem.'.($loop->index).'.price', $orderItem->price) }}">
                    @if ($errors->has('orderitem.'.($loop->index).'.price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orderitem.'.($loop->index).'.price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @if($loop->index !==0)
                <div class="row">
                    <div class="col-md-12">
                        <button onclick="deleteOrderItem({{$loop->index}})" type="button">Remove</button>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
@else
    <div class="form-group{{ $errors->has('orderitem.'.(0).'.name') || $errors->has('orderitem.'.(0).'.price') ? ' has-error' : '' }}">
        <div class="row">
            <label for="name-{{(0)}}" class="col-md-4 control-label">Item {{(0)}} Name</label>
            <div class="col-md-8">
                <input id="name-{{(0)}}" type="text" class="form-control" name="orderitem[{{(0)}}][name]"
                       value="{{ old('orderitem.'.(0).'.name') }}">
                @if ($errors->has('orderitem.'.(0).'.name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('orderitem.'.(0).'.name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <label for="price-{{(0)}}" class="col-md-4 control-label">Item {{(0)}} Price</label>
            <div class="col-md-8">
                <input id="price-{{(0)}}" type="number" class="form-control" name="orderitem[{{(0)}}][price]"
                       value="{{ old('orderitem.'.(0).'.price') }}">
                @if ($errors->has('orderitem.'.(0).'.price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('orderitem.'.(0).'.price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
@endif
</div>

<button type="button" id="add-order-item">add order item</button>

@section('foot')
    <script type="text/javascript">
        let currentIndex = {{$order->orderItems->count() === 0 ? '1' : $order->orderItems->count()}};

        function deleteOrderItem(index){
            if(index > 0){
                $('#order-items-'+index).remove();
            }
        }

        function getOrderItemBlock(index)
        {
            return '<div id="order-items-'+index+'" class="form-group">\n' +
                '    <div class="row">\n' +
                '        <label for="name-' + index + '" class="col-md-4 control-label">Item ' + index + ' Name</label>\n' +
                '        <div class="col-md-8">\n' +
                '            <input id="name-' + index + '" type="text" class="form-control" name="orderitem[' + index + '][name]">\n' +
                '        </div>\n' +
                '    </div>\n' +
                '    <div class="row">\n' +
                '        <label for="price-' + index + '" class="col-md-4 control-label">Item ' + index + ' Price</label>\n' +
                '        <div class="col-md-8">\n' +
                '            <input id="price-' + index + '" type="number" class="form-control" name="orderitem[' + index + '][price]">\n' +
                '        </div>\n' +
                '    </div>' +
                '    <div class="row">' +
                '       <div class="col-md-12">' +
                '           <button onclick="deleteOrderItem('+index+')" type="button">Remove</button>' +
                '       </div>' +
                '    </div>' +
                ''
        }

        $('#add-order-item').click(function(e) {
            $('#order-items-container').append(getOrderItemBlock(currentIndex))

            currentIndex++;
        });
    </script>
@endsection
