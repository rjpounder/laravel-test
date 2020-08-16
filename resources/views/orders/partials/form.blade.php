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

@if($order->orderItems->count() > 0)
    @foreach($order->orderItems as $orderItem)
        <div class="form-group{{ $errors->has('orderitem.'.($loop->index).'.name') || $errors->has('orderitem.'.($loop->index).'.price') ? ' has-error' : '' }}">
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
                    <input id="price-{{($loop->index)}}" type="text" class="form-control" name="orderitem[{{($loop->index)}}][price]"
                           value="{{ old('orderitem.'.($loop->index).'.price', $orderItem->price) }}">
                    @if ($errors->has('orderitem.'.($loop->index).'.price'))
                        <span class="help-block">
                    <strong>{{ $errors->first('orderitem.'.($loop->index).'.price') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@else
    no items
@endif

<script>

</script>
