<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('banner')->nullable();

            $table->bigInteger('category')->unsigned();
            $table->foreign('category')->references('id')->on('course_categories');

            $table->string('owner')->nullable();                       
            $table->longText('overview')->nullable();
            $table->double('price')->nullable();
            $table->string('status')->nullable();
            $table->boolean('course')->default(0);
            $table->longText('preview')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
