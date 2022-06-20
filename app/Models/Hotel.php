<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Hotel extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait, HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'hotels';
    protected $fillable=['name','city_id', 'street'];
    protected $guarded = ['id'];
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function city(){
        return $this->belongsTo(City::class);
    }
}
