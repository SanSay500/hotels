    <section class="offer__add">
    <style>
        [data-tooltip] {
        position: relative; /* Относительное позиционирование */ 
        }
        [data-tooltip]::after {
            content: attr(data-tooltip);
            position: absolute;
            width: 300px; 
            left: 0; top: 0px; 
            background-color: #0d6efd; 
            font-size: 10px;
            line-height: 12px;
            color: #fff; 
            padding: 5px 10px; 
            pointer-events: none; 
            opacity: 0; 
            transition: 1s;
        }
        [data-tooltip]:hover::after, [data-tooltip]:focus::after {
    opacity: 1; /* Показываем подсказку */
    top: 4em;
    left: 20px /* Положение подсказки */
   }
    </style>
        <div class="container">

            <form action="{{ route('offer.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    @if(session('success'))
                    <div class="container">
                            <div class="alert alert-success">
                                {{ session('success') }}

                            </div>
                    </div>
                    @endif

                    <label for="txtArrivalDate">Arrival Date</label>
                    <input name="arrivalDate" type="date" min="<?php echo date("Y-m-d"); ?>" id="txtArrivalDate" class="form-control
                   @error ('arrivalDate') is-invalid @enderror" value="{{ old('arrivalDate') }}">
                    @error ('arrivalDate')
                    <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="txtContent">City</label>
{{--                    <select wire:model="city" name="city" class="form-control">--}}
{{--                        <option value=''>Choose a city</option>--}}
{{--                        @foreach ($cities as $city)--}}
{{--                            <option value={{$city->id}}>{{ $city->name }} </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                    <input list="cities" wire:model="city" name="city" class="form-control" placeholder="Enter city"/>
                    <datalist id="cities">
                        @foreach ($cities as $c)
                            <option value="{{ $c->name }}">
                        @endforeach
                    </datalist>
                </div>

                <label for="txtContent">Hotel</label>
                <div class="from-control d-flex">
               <select wire:model="hotel" name = "hotel" class="form-control">
                        <option value=''>Choose a hotel</option>
                        @foreach ($hotels as $hotel)
                            <option value={{$hotel->id}}> {{ $hotel->name }} </option>
                        @endforeach
                    </select>
                    @if ($city)
                    <a href="/hotel/add/{{$city}}"
                       class="">Add</a>
                    @endif
                </div>

                <div class="form-group">
                    <label for="txtNights">Nights</label>
                    <input name="nights" id="txtNights"
                           class="form-control @error ('nights') is-invalid @enderror" row="3" value="{{ old('nights') }}">
                    @error ('nights')
                    <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="txtRooms">Rooms Quantity</label>
                    <input name="rooms" id="txtRooms"
                           class="form-control @error ('rooms') is-invalid @enderror" row="3" value="{{ old('rooms') }}">
                    @error ('rooms')
                    <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="txtRooms">Rooms class</label>
                    <select name="room_class" class="form-control">
                        @foreach ($rooms as $room)
                            <option>{{ $room->room_class }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtRooms">Meals</label>
                    <select name="meals" class="form-control">
                        @foreach ($meals as $meal)
                            <option>{{ $meal->meals }} </option>
                        @endforeach
                    </select>
                    </span>
                </div>
                <div class="form-group">
                    <label for="txtPrice">Price</label>
                    <input name="price" id="txtPrice"
                           class="form-control @error ('price') is-invalid @enderror" value="{{ old('price') }}">
                    @error ('price')
                    <span class="invalid-feedback">
                <strong> {{ $message }}</strong>
            </span>
                    @enderror
                </div>
                <div class="row mb-3 align-items-center">
                    <label title="Show my contact details to all those interested in my offers." for="private_policy"
                           class="col-md-4 col-form-label text-sd-end card-label privacy-label" >
                        <span data-tooltip="Show my contact details to all those interested in my offers.">{{ __('Private policy') }}</span></label>
                    <div class="col-md-6">
                        <input type="checkbox" id="private_policy" name="private_policy">
                    </div>
                </div>
                <br>
                <div class="btn-container"><a class="more-btn back-btn" href="/home">Back</a>
                    <input type="submit" class="more-btn back-btn" value="Publish offer "> </div>
            </form>
            <br>

        </div>
    </section>
