<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

   use HasFactory;

   protected $fillable=['offer_content',
       'offer_hotel',
       'offer_nights',
       'offer_rooms_quantity',
       'offer_room_class',
       'offer_meals',
       'offer_arrival_date',
       'offer_price',
       'private_policy',
       'offer_status',
       'user_id','offer_city'];

   public function user(){
       return $this->belongsTo(User::class);
   }
}
