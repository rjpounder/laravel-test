{{ csrf_field() }}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>
    <div class="col-md-12">
        <input id="name" type="text" class="form-control" name="name"
               value="{{ old('name', $address->name) }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('address_line_1') ? ' has-error' : '' }}">
    <label for="address_line_1" class="col-md-4 control-label">Address Line 1</label>
    <div class="col-md-12">
        <input id="address_line_1" type="text" class="form-control" name="address_line_1"
               value="{{ old('address_line_1', $address->address_line_1) }}">
        @if ($errors->has('address_line_1'))
            <span class="help-block">
                <strong>{{ $errors->first('address_line_1') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('address_line_2') ? ' has-error' : '' }}">
    <label for="address_line_2" class="col-md-4 control-label">Address Line 2</label>
    <div class="col-md-12">
        <input id="address_line_2" type="text" class="form-control" name="address_line_2"
               value="{{ old('address_line_2', $address->address_line_2) }}">
        @if ($errors->has('address_line_2'))
            <span class="help-block">
                <strong>{{ $errors->first('address_line_2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <label for="city" class="col-md-4 control-label">City</label>
    <div class="col-md-12">
        <input id="city" type="text" class="form-control" name="city"
               value="{{ old('city', $address->city) }}">
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
    <label for="town" class="col-md-4 control-label">Town</label>
    <div class="col-md-12">
        <input id="town" type="text" class="form-control" name="town"
               value="{{ old('town', $address->town) }}">
        @if ($errors->has('town'))
            <span class="help-block">
                <strong>{{ $errors->first('town') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
    <label for="zip_code" class="col-md-4 control-label">Postal Code</label>
    <div class="col-md-12">
        <input id="zip_code" type="text" class="form-control" name="zip_code"
               value="{{ old('city', $address->zip_code) }}">
        @if ($errors->has('zip_code'))
            <span class="help-block">
                <strong>{{ $errors->first('zip_code') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
    <label for="country" class="col-md-4 control-label">Country</label>
    <div class="col-md-12">
        <input id="country" type="text" class="form-control" name="country"
               value="{{ old('city', $address->country) }}">
        @if ($errors->has('country'))
            <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
    </div>
</div>
