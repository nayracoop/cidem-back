<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('filter_type_id');
            $table->string('slug');
            $table->string('name');
            $table->string('summary')->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('icon')->nullable();
            $table->integer('parent')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('filter_type_id')->references('id')->on('filter_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters');
    }
}
