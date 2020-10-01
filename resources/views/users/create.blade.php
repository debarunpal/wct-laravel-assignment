@extends('layouts.app')
@section('title', '| Create User')
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-user-plus'></i> Create User</h1>
    <hr>
    {!! Form::open(array('url' => 'users')) !!}
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', '', array('class' => 'form-control')) !!}
    </div>
    <div class="form-group @if ($errors->has('email')) has-error @endif">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', '', array('class' => 'form-control')) !!}
    </div>
    <div class="form-group @if ($errors->has('roles')) has-error @endif">
        @foreach ($roles as $role)
            {!! Form::checkbox('roles[]',  $role->id ) !!}
            {!! Form::label($role->name, ucfirst($role->name)) !!}<br>
        @endforeach
    </div>
    <div class="form-group @if ($errors->has('password')) has-error @endif">
        {!! Form::label('password', 'Password') !!}<br>
        {!! Form::password('password', array('class' => 'form-control')) !!}
    </div>
    <div class="form-group @if ($errors->has('password')) has-error @endif">
        {!! Form::label('password', 'Confirm Password') !!}<br>
        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
    </div>
    {!! Form::submit('Register', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}

    <div class="form-group">
        <label for="address_address">Address</label>
        <input type="text" id="address-input" name="address_address" class="form-control map-input">
        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
    </div>
    <div id="address-map-container" style="width:100%;height:400px; ">
        <div style="width: 100%; height: 100%" id="address-map"></div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>
@stop
