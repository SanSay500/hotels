<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('offer_id');
            $table->foreignId('buyer_id')->constrained('users','id')->onDelete('cascade');
            $table->foreignId('seller_id')->constrained('users','id')->onDelete('cascade');
            $table->string('city');
            $table->string('hotel');
            $table->date('arrival_date');
            $table->string('price');
            $table->string('rooms_quantity');
            $table->string('nights');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
