<section class="hotels">
    <style>
        /* arrow common style */
        .dear {
            font-size: 20px !important;
        }
        .div-login {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .div-btn-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .div-btn-right {
            display: flex;
            justify-content: right;
        }
        .btn-primary {
            display: flex;
            align-items: center;
            font-size: 18px;
            justify-content: center;
        }
        .offer-table td{
            font-size: 16px;
        }
        .offer-table th{
            font-size: 16px;
        }
        .arrow {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-top: 2px solid #000;
            border-right: 2px solid #000;
        }

        .arrow-right {
            transform: rotate(45deg);
        }
    </style>
    <div class="container">
        @guest
            <div class="info-for-agent">
                <ul class="info-list">
                    <h3 class="dear">Dear Agent,</h3>
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
                <label for="filter-city" class="card-label offer-label">{{ __('Filter by City') }}</label>
                <input wire:model="filters.offer_city" type="text" class="form-control" id="filter-city"
                       placeholder="Enter city">
            </div>
            <div class="filter filter-hotel">
                <label for="filter-hotel" class="card-label offer-label">{{ __('Filter by Hotel') }}</label>
                <input wire:model="filters.offer_hotel" type="text" class="form-control" id="filter-hotel"
                       placeholder="Enter hotel">
            </div>
            <div class="filter filter-date">
                <label for="filter-date" class="card-label offer-label">{{ __('Date from') }}</label>
                <input wire:model="filtersDate.offer_arrival_date" min="<?php echo date("Y-m-d"); ?>" type="date"
                       class="form-control" id="filter-date"
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
                <th style="text-align: center" wire:click="sortFields('offer_hotel')">
                    @if ($orderBy == 'offer_hotel')
                        {{$orderAsc ? '▲' : '▼'}}
                    @endif
                    Hotel
                </th>
                <th @if((new \Jenssegers\Agent\Agent())->isMobile()) hidden @endif style="text-align: center" wire:click="sortFields('offer_city')">
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
                    <td style="white-space: pre-line">{{\Carbon\Carbon::parse($offer->offer_arrival_date)->format('j.m Y')}}</td>
                    <td style="text-align: center">{{$offer->offer_nights}}</td>
                    <td>{{$offer->offer_hotel}} @if((new \Jenssegers\Agent\Agent())->isMobile()) (<b>{{$offer->offer_city}}</b>)@endif</td>
                    <td @if((new \Jenssegers\Agent\Agent())->isMobile()) hidden @endif><b>{{$offer->offer_city}}</b>   </td>
                    <td>₪{{$offer->offer_price}}</td>
                    <td style="text-align: center">{{$offer->offer_rooms_quantity}}</td>
                    <td>
                        <a class="arrow arrow-right" href="{{route('detail',['offer'=>$offer->id])}}">
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

            @if($offers->hasMorePages())
                @if((new \Jenssegers\Agent\Agent())->isMobile())
                    @guest
                <div class="div-login">
                        <div>
                            <a href="{{ route('register') }}">Sign up&nbsp </a>/
                            <a href="{{ route('login') }}">&nbspLogin&nbsp</a><br>to see
                            more options
                        </div>
                    @endguest
                    <div class="div-btn-right">
                        <button class="btn btn-primary" wire:click.prevent="loadMore">Show more</button>
                    </div>
                </div>

                @else
                    <div class="div-btn-center">
                        <button class="btn btn-primary" wire:click.prevent="loadMore">Show more</button>
                    </div>
                <br>
                    @guest
                        <div class="div-btn-center">
                            <a href="{{ route('register') }}">Sign up&nbsp </a>/
                            <a href="{{ route('login') }}">&nbspLogin&nbsp</a>to see
                            more options
                        </div>
                   @endguest
    @endif
    @endif

</section>


