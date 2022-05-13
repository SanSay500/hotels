    <section class="offer__add">
        <div class="container">
            <form action="{{ route('offer.store') }}" method="POST">
                @csrf
                <div class="form-group">
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
                    <select wire:model="city" name="city" class="form-control">
                        <option value=''>Choose a city</option>
                        @foreach ($cities as $city)
                            <option value={{$city->id}}>{{ $city->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtContent">Hotel</label>
                    <select wire:model="hotel" name = "hotel" class="form-control">
                        <option value=''>Choose a hotel</option>
                        @foreach ($hotels as $hotel)
                            <option value={{$hotel->id}}>{{ $hotel->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtContent">Description</label>
                    <textarea name="content" id="txtContent"
                              class="form-control @error ('content') is-invalid @enderror" row="3" value="{{ old('content') }}"></textarea>
                    @error ('content')
                    <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
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
                <br>
                <div class="btn-container"><a class="more-btn back-btn" href="/home">Back</a>
                    <input type="submit" class="more-btn back-btn" value="Add "> </div>
            </form>
            <br>

        </div>
    </section>
