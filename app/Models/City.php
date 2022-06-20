<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class City extends Model
{

    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function hotels() {
        return $this->hasMany(Hotel::class);
}
}
