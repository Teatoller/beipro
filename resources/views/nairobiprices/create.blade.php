@extends('layout')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="card uper">
    <div class="card-header">
        Add Price
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
        <form method="post" action="{{ route('nairobiprices.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Marketer Name</label>
                <input type="text" class="form-control" name="marketer_name">
            </div>

            <div class="form-group">
                <label for="price">Diesel</label>
                <input type="text" class="form-control" name="diesel_price">
            </div>

            <div class="form-group">
                <label for="price">Petrol</label>
                <input type="text" class="form-control" name="petrol_price">
            </div>

            <div class="form-group">
                <label for="price">Kerosene</label>
                <input type="text" class="form-control" name="kerosene_price">
            </div>

            <div class="form-group">
                <label for="price">Industrial Diesel Oil</label>
                <input type="text" class="form-control" name="ido_price">
            </div>

            <div class="form-group">
                <label for="price">Fuel Oil</label>
                <input type="text" class="form-control" name="fo_price">
            </div>

            <div class="form-group">
                <label for="price">Liquified Petroleum Gas</label>
                <input type="text" class="form-control" name="lpg_price">
            </div>

            <button type="submit" class="btn btn-primary" >Add</button>

        </form>
    </div>
</div>
@endsection
