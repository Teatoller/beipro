@extends('layout')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="card uper">
    <div class="card-header">
        Edit Price
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('nairobiprices.update', $nairobiprice->id) }}">
        @csrf
        @method('PATCH')
            <div class="form-group">
                
                <label for="name">Marketer Name</label>
                <input type="text" class="form-control" name="marketer_name" value="{{ $nairobiprice->marketer_name}}">
            </div>

            <div class="form-group">
                <label for="price">Diesel</label>
                <input type="text" class="form-control" name="diesel_price" value="{{ $nairobiprice->diesel_price}}">
            </div>

            <div class="form-group">
                <label for="price">Petrol</label>
                <input type="text" class="form-control" name="petrol_price" value="{{ $nairobiprice->petrol_price}}">
            </div>

            <div class="form-group">
                <label for="price">Kerosene</label>
                <input type="text" class="form-control" name="kerosene_price" value="{{ $nairobiprice->kerosene_price}}">
            </div>

            <div class="form-group">
                <label for="price">Industrial Diesel Oil</label>
                <input type="text" class="form-control" name="ido_price" value="{{ $nairobiprice->ido_price}}">
            </div>

            <div class="form-group">
                <label for="price">Fuel Oil</label>
                <input type="text" class="form-control" name="fo_price" value="{{ $nairobiprice->fo_price}}">
            </div>

            <div class="form-group">
                <label for="price">Liquified Petroleum Gas</label>
                <input type="text" class="form-control" name="lpg_price" value="{{ $nairobiprice->lpg_price}}">
            </div>

            <button type="submit" class="btn btn-primary" >Update</button>

        </form>
    </div>
</div>
@endsection
