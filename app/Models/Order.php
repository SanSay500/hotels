<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable=[
        'hotel',
        'seller_id',
        'buyer_id',
        'nights',
        'rooms_quantity',
        'arrival_date',
        'price',
        'city',
        'status',
        'offer_id'];

    public function order_statuses(){
        return $this->belongsTo(OrderStatus::class);
    }
}
