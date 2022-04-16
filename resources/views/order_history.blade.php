@extends('layouts.base')

@section('title', 'My Offers')

@section('main')
    @if (count($ordersSold)>0)
        <p style="background:lightcyan">I SOLD</p>
        <table class="table table-stripped">
            <thead>
            <tr>
                <th>Hotel</th>
                <th>City</th>
                <th>Arrival Date</th>
                <th>Nights</th>
                <th>Rooms SOLD</th>
                <th>Price</th>
                <th colspan="2">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ordersSold as $order)
                <tr>
                    <td><h3>{{$order->hotel}}</h3></td>
                    <td><h3>{{$order->city}}</h3></td>
                    <td><h3>{{$order->arrival_date}}</h3></td>
                    <td><h3>{{$order->nights}}</h3></td>
                    <td><h3>{{$order->rooms_quantity}}</h3></td>
                    <td><h3>{{$order->price}}</h3></td>
                </tr>
        @endforeach
            </tbody>
        </table>
@endif


            @if (count($ordersBought)>0)
                <p style="background:sandybrown"> I BOUGHT</p>
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th>Hotel</th>
                        <th>City</th>
                        <th>Arrival Date</th>
                        <th>Nights</th>
                        <th>Rooms BOUGHT</th>
                        <th>Price</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ordersBought as $order)
                        <tr>
                            <td><h3>{{$order->hotel}}</h3></td>
                            <td><h3>{{$order->city}}</h3></td>
                            <td><h3>{{$order->arrival_date}}</h3></td>
                            <td><h3>{{$order->nights}}</h3></td>
                            <td><h3>{{$order->rooms_quantity}}</h3></td>
                            <td><h3>{{$order->price}}</h3></td>
                        </tr>
        @endforeach
                    </tbody>
                </table>
    @endif

@endsection
