<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Offer extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
   use HasFactory, AsSource, Filterable, Attachable;

   protected $fillable=['offer_content',
       'offer_hotel',
       'offer_nights',
       'offer_rooms_quantity',
       'offer_room_class',
       'offer_meals',
       'offer_arrival_date',
       'offer_price',
       'user_id','offer_city'];

   public function user(){
       return $this->belongsTo(User::class);
   }
}
