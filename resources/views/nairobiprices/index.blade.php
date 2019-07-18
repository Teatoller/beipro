@extends('layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{(session()->get('success'))}}
    </div><br />
    @endif
    <table class="table  table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Marketer</td>
                <td>Diesel Price</td>
                <td>Petrol Price</td>
                <td>Kerosene Price</td>
                <td>IDO Price</td>
                <td>FO Price</td>
                <td>LPG Price</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($nairobiprices as $nairobiprice)
            <tr>
                <td>{{$nairobiprice->id}}</td>
                <td>{{$nairobiprice->marketer_name}}</td>
                <td>{{$nairobiprice->diesel_price}}</td>
                <td>{{$nairobiprice->petrol_price}}</td>
                <td>{{$nairobiprice->kerosene_price}}</td>
                <td>{{$nairobiprice->ido_price}}</td>
                <td>{{$nairobiprice->fo_price}}</td>
                <td>{{$nairobiprice->lpg_price}}</td>
                <td>
                    <a href="{{route('nairobiprices.edit', $nairobiprice->id)}}" class="btn btn-primary">
                        Edit
                    </a>
                </td>

                <td>
                    <form action="{{route('nairobiprices.destroy', $nairobiprice->id)}}"  method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
