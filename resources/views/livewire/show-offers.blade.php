    <section class="hotels">
        <div class="container">
            <div class="info-for-agent">
                <ul class="info-list">
                    <li class="info-item">Before using our service, try to negotiate a refund for your canceled bookings directly with the hotel.</li>
                    <li class="info-item">If the full or partial refund for the cancelations is not possible, check if any restrictions may apply to selling the canceled bookings to a third party (another agent).</li>
                    <li class="info-item">If there are no restrictions applicable, place your offer with our service.</li>
                    <li class="info-item">Follow the notifications from our service. Please make sure that you update all relevant information if the bookings are being sold otherwise.</li>
                    <li class="info-item">Your feedback is highly appreciated and will help us improve our service.</li>
                </ul>
            </div>
            <div class="filter-container">
                <div class="filter filter-city">
                    <label for="filter-city" class="card-label offer-label">{{ __('Filter by city') }}</label>
                    <input wire:model="filters.offer_city" type="text" class="form-control" id="filter-city" placeholder="Enter city">
                </div>
                <div class="filter filter-hotel">
                    <label for="filter-hotel" class="card-label offer-label">{{ __('Filter by hotel') }}</label>
                    <input wire:model="filters.offer_hotel" type="text" class="form-control" id="filter-hotel" placeholder="Enter hotel">
                </div>
                <div class="filter filter-date">
                    <label for="filter-date" class="card-label offer-label">{{ __('Filter by date') }}</label>
                    <input wire:model="filters.offer_arrival_date" type="date" class="form-control" id="filter-date" placeholder="Enter date">
                </div>
            </div>
        <table class="table table-stripepd offer-table">
        <thead>
        <tr>
            <th wire:click="sortFields('offer_city')">
                @if ($orderBy == 'offer_city')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif
                City</th>
            <th class="coldn" wire:click="sortFields('offer_hotel')">
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
            <th class="col22" wire:click="sortFields('offer_rooms_quantity')">
                @if ($orderBy == 'offer_rooms_quantity')
                    {{$orderAsc ? '▲' : '▼'}}
                @endif
                Rooms quantity</th>
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
                <td class="coldn">{{$offer->offer_hotel}}</td>
                <td>{{$offer->offer_arrival_date}}</td>
                <td>{{$offer->offer_nights}}</td>
                <td>{{$offer->offer_rooms_quantity}}</td>
                <td>{{$offer->offer_price}}</td>
                <td>
                    <a class="more-btn" href="{{route('detail',['offer'=>$offer->id])}}">About</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    @if($offers->hasMorePages())--}}
{{--        <div align="center"><button wire:click.prevent="loadPosts">Load more</button></div>--}}
{{--    @endif--}}
    <div align="center">{{ $offers->links() }}</div>
        </div>
    </section>
    

