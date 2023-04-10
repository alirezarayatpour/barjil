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
            $table->integer('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->bigInteger('codePost');
            $table->string('phoneMain');
            $table->string('phone');
            $table->string('email');
            $table->text('description')->nullable();
            $table->string('pay');
            $table->string('agree');
            $table->string('total_price');
            $table->string('tracking_no');
            $table->tinyInteger('status')->default(0);
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
