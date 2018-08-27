<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters_services', function (Blueprint $table) {
            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services');

            $table->integer('filter_id')->unsigned()->index();
            $table->foreign('filter_id')->references('id')->on('filters');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters_services');
    }
}
