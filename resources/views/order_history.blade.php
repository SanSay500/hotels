@extends('layouts.base')

@section('title', 'My Offers')

@section('main')
<section class="order-history">
    <div class="container">
    @if (count($ordersSold)>0)
        <h4 style="color:#00bf99;text-align:center">I SOLD</h4>
        <table class="table table-stripped">
            <thead>
            <tr>
                <th>Hotel</th>
                <th>City</th>
                <th>Arrival Date</th>
                <th>Nights</th>
                <th class="col22">Rooms SOLD</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ordersSold as $order)
                <tr>
                    <td class="col22"><h3>{{$order->hotel}}</h3></td>
                    <td class="col22"><h3>{{$order->city}}</h3></td>
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
                <h4 style="color:sandybrown;text-align:center"> I BOUGHT</h4>
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th>Hotel</th>
                        <th>City</th>
                        <th >Arrival Date</th>
                        <th >Nights</th>
                        <th class="col22">Rooms BOUGHT</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ordersBought as $order)
                        <tr>
                            <td class="col22"><h3>{{$order->hotel}}</h3></td>
                            <td class="col22"><h3>{{$order->city}}</h3></td>
                            <td><h3>{{$order->arrival_date}}</h3></td>
                            <td><h3>{{$order->nights}}</h3></td>
                            <td><h3>{{$order->rooms_quantity}}</h3></td>
                            <td><h3>{{$order->price}}</h3></td>
                        </tr>
        @endforeach
                    </tbody>
                </table>
    @endif
    </div>
</section>


@endsection
