    <table class="table table-stripepd">
        <thead>
        <tr>
            <th>
                <input wire:model="filters.offer_city" type="text" class="form-control" placeholder="Filter by city">
            </th>
            <th>
                <input wire:model="filters.offer_hotel" type="text" class="form-control" placeholder="Filter by hotel">
            </th>
            <th>
                <input wire:model="filters.offer_arrival_date" type="date" class="form-control" placeholder="Filter by date">
            </th>
        </tr>
        <tr>
            <th wire:click="sortFields('offer_city')">
                @if ($orderBy == 'offer_city')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif
                City</th>
            <th wire:click="sortFields('offer_hotel')">
                @if ($orderBy == 'offer_hotel')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif
                    Hotel</th>
            <th wire:click="sortFields('offer_arrival_date')">
                @if ($orderBy == 'offer_arrival_date')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif
                Arrival Date</th>
            <th wire:click="sortFields('offer_nights')">
                @if ($orderBy == 'offer_nights')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif
                Nights</th>
            <th wire:click="sortFields('offer_rooms_quantity')">
                @if ($orderBy == 'offer_rooms_quantity')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif
                Rooms quiantity</th>
            <th wire:click="sortFields('offer_price')">Price
                @if ($orderBy == 'offer_price')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
            <tr>
                <td>
                    <h3>{{$offer->offer_city}}</h3>
                </td>
                <td>{{$offer->offer_hotel}}</td>
                <td>{{$offer->offer_arrival_date}}</td>
                <td>{{$offer->offer_nights}}</td>
                <td>{{$offer->offer_rooms_quantity}}</td>
                <td>{{$offer->offer_price}}</td>
                <td>
                    <a href="{{route('detail',['offer'=>$offer->id])}}">About...</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    @if($offers->hasMorePages())--}}
{{--        <div align="center"><button wire:click.prevent="loadPosts">Load more</button></div>--}}
{{--    @endif--}}
    <div align="center">{{ $offers->links() }}</div>

