<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Offer;
use Livewire\WithPagination;



class ShowOffers extends Component
{
    use WithPagination;

    /**
     * @var $offers
     */
    protected $offers;
    /**
     * @var array
     */
    public $filters=[];
    public $filtersDate=[];

    /**
     * @var bool
     */
    public $orderAsc =true;
    /**
     * @var int
     */
    public $perPage = 10;
    /**
     * @var string
     */
    public $orderBy = 'offer_arrival_date';

    /**
     * @param $field
     * @return void
     */
    public function sortFields ($field){
        $this->orderBy= $field;
        $this->toggleOrderAsc();
    }

    /**
     * @return void
     */
    public function loadMore()
    {
        $this->perPage += 10;
    }

    /**
     * @return void
     */
    public function toggleOrderAsc(){
        $this->orderAsc = ! $this->orderAsc;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {

        $this->offers = Offer::query()->where('offer_rooms_quantity','>',0)
            ->where('offer_arrival_date','>', now())
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc');

        if(!empty($this->filters)){
            foreach ($this->filters as $key=>$value){
                if(empty($value)){
                    continue;
                }
            $this->offers = $this->offers->where($key,'like', "%{$value}%");
            }
        }
        if(!empty($this->filtersDate)) {
            foreach ($this->filtersDate as $key => $value) {
                $this->offers = $this->offers->where($key, '>=', "{$value}");
            }
        }
        $this->offers=$this->offers->cursorPaginate($this->perPage);
        return view('livewire.show-offers', ['offers'=>$this->offers]);
    }

}
