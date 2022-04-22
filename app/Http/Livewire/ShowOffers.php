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
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc');

        if(!empty($this->filters)){
            foreach ($this->filters as $key=>$value){
                if(empty($value)){
                    continue;
                }
            $this->offers = $this->offers->where($key,'like', "%{$value}%");
            }
        }
        $this->offers=$this->offers->cursorPaginate($this->perPage);
        return view('livewire.show-offers', ['offers'=>$this->offers]);
    }

//
//    public $posts; // holds are list of posts.
//    public $nextCursor; // holds our current page position.
//    public $hasMorePages; // Tells us if we have more pages to paginate.
//
//    /**
//     * Initialize data
//     * @return void
//     */
//    public function mount()
//    {
//        $this->posts = new Collection(); // initialize the data
//        $this->loadPosts(); // load the data
//    }
//
//    /**
//     * Load data and maintain cursor state
//     *
//     */
//    public function loadPosts()
//    {
//        if ($this->hasMorePages !== null  && !$this->hasMorePages) {
//            return;
//        }
//
//        $posts = Offer::cursorPaginate(
//            15,
//            ['*'],
//            'cursor',
//            Cursor::fromEncoded($this->nextCursor)
//        );
//        $this->posts->push(...$posts->items());
//        $this->hasMorePages = $posts->hasMorePages();
//        if ($this->hasMorePages === true) {
//            $this->nextCursor = $posts->nextCursor()->encode();
//        }
//    }
//
//    /**
//     * Render our component
//     *
//     */
//    public function loadPosts()
//    {
//        if ($this->hasMorePages !== null  && !$this->hasMorePages) {
//            return;
//        }
//
//        $posts = Offer::cursorPaginate(
//            15,
//            ['*'],
//            'cursor',
//            Cursor::fromEncoded($this->nextCursor)
//        );
//        $this->posts->push(...$posts->items());
//        $this->hasMorePages = $posts->hasMorePages();
//        if ($this->hasMorePages === true) {
//            $this->nextCursor = $posts->nextCursor()->encode();
//        }
//    }
//

}
