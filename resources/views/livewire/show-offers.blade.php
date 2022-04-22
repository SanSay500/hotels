<section class="hotels">
    <div class="container">
        @guest
            <div class="info-for-agent">
                <ul class="info-list">
                    <li class="info-item">Before using our service, try to negotiate a refund for your canceled bookings
                        directly with the hotel.
                    </li>
                    <li class="info-item">If the full or partial refund for the cancelations is not possible, check if
                        any restrictions may apply to selling the canceled bookings to a third party (another agent).
                    </li>
                    <li class="info-item">If there are no restrictions applicable, place your offer with our service.
                    </li>
                    <li class="info-item">Follow the notifications from our service. Please make sure that you update
                        all relevant information if the bookings are being sold otherwise.
                    </li>
                    <li class="info-item">Your feedback is highly appreciated and will help us improve our service.</li>
                </ul>
            </div>
        @endguest
        <div class="filter-container">
            <div class="filter filter-city">
                <label for="filter-city" class="card-label offer-label">{{ __('Filter by city') }}</label>
                <input wire:model="filters.offer_city" type="text" class="form-control" id="filter-city"
                       placeholder="Enter city">
            </div>
            <div class="filter filter-hotel">
                <label for="filter-hotel" class="card-label offer-label">{{ __('Filter by hotel') }}</label>
                <input wire:model="filters.offer_hotel" type="text" class="form-control" id="filter-hotel"
                       placeholder="Enter hotel">
            </div>
            <div class="filter filter-date">
                <label for="filter-date" class="card-label offer-label">{{ __('Filter by date') }}</label>
                <input wire:model="filters.offer_arrival_date" type="date" class="form-control" id="filter-date"
                       placeholder="Enter date">
            </div>
        </div>
        <table class="table table-stripepd offer-table">
            <thead>
            <tr>
                <th wire:click="sortFields('offer_arrival_date')">
                    @if ($orderBy == 'offer_arrival_date')
                        {{$orderAsc ? '▲' : '▼'}}
                    @endif
                    Date
                </th>
                <th wire:click="sortFields('offer_nights')">
                    @if ($orderBy == 'offer_nights')
                        {{$orderAsc ? '▲' : '▼'}}
                    @endif
                    Nights
                </th>
                <th wire:click="sortFields('offer_hotel')">
                    @if ($orderBy == 'offer_hotel')
                        {{$orderAsc ? '▲' : '▼'}}
                    @endif
                    Hotel
                </th>
                <th wire:click="sortFields('offer_city')">
                    @if ($orderBy == 'offer_city')
                        {{$orderAsc ? '▲' : '▼'}}
                    @endif
                    City
                </th>
                <th wire:click="sortFields('offer_price')">
                    @if ($orderBy == 'offer_price')
                        {{$orderAsc ? '▲' : '▼'}}
                    @endif
                    Price
                </th>
                <th wire:click="sortFields('offer_rooms_quantity')">
                    @if ($orderBy == 'offer_rooms_quantity')
                        {{$orderAsc ? '▲' : '▼'}}
                    @endif
                    Rooms
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
                <tr>
                    <td style="white-space:nowrap">{{\Carbon\Carbon::parse($offer->offer_arrival_date)->format('j M `y') }}</td>
                    <td  style="text-align: center">{{$offer->offer_nights}}</td>
                    <td >{{$offer->offer_hotel}}</td>
                    <td >{{$offer->offer_city}}</td>
                    <td>{{$offer->offer_price}}</td>
                    <td style="text-align: center">{{$offer->offer_rooms_quantity}}</td>
                    <td>
                        <a class="img-btn arrow-btn" href="{{route('detail',['offer'=>$offer->id])}}">
                            <svg class="img-icon arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M374.6 310.6l-160 160C208.4 476.9 200.2 480 192 480s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 370.8V64c0-17.69 14.33-31.1 31.1-31.1S224 46.31 224 64v306.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0S387.1 298.1 374.6 310.6z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            @if($offers->hasMorePages())
                <div align="center"><button class="btn btn-primary" wire:click.prevent="loadMore">Load more</button></div>
            @endif
{{--        <div align="center">{{ $offers->links() }}</div>--}}
    </div>
</section>


