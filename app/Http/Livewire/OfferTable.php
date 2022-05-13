<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Offer;

class OfferTable extends DataTableComponent
{
    protected $model = Offer::class;

    public function configure(): void
    {

        $this->setPrimaryKey('id');

    }

    public function columns(): array
    {
        return [
            Column::make("Date", "offer_arrival_date")
                ->sortable(),
            Column::make("Nights", "offer_nights")
                ->sortable(),
            Column::make("Hotel", "offer_hotel")
                ->sortable(),
            Column::make("City", "offer_city")
                ->sortable(),
            Column::make("Rooms", "offer_rooms_quantity")
                ->sortable(),
            Column::make("Price", "offer_price")
                ->sortable(),

        ];
    }
}
