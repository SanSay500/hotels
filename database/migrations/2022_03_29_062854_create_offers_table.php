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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->text('offer_content')->nullable();
            $table->string('offer_hotel');
            $table->float('offer_price');
            $table->integer('offer_nights');
            $table->date('offer_arrival_date')->nullable();
            $table->string('offer_city')->index();
            $table->string('offer_meals')->nullable();
            $table->string('offer_room_class')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('offer_rooms_quantity')->nullable();
            $table->enum('offer_status', ['Active', 'Inactive']);
            $table->boolean('private_policy')->nullable();
            $table->timestamps();
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
