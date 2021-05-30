<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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

            $table->string('learner_email')->nullable();
            $table->string('trainer_email')->nullable();
            $table->bigInteger('course')->unsigned();
            $table->foreign('course')->references('id')->on('courses');
            $table->string('price')->nullable();
            $table->string('trainer_bkash')->nullable();
            $table->string('learner_bkash')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment')->nullable();

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
}
