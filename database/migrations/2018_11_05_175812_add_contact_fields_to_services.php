<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactFieldsToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('services', function (Blueprint $table) {
            //
            $table->string('contact_name')->nullable()->after('website');
            $table->string('email')->nullable()->after('contact_name');
            $table->string('phone')->nullable()->after('email');
            $table->string('address')->nullable()->after('phone');
            $table->string('slug')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $table->dropColumn('contact_name');
        $table->dropColumn('email');
        $table->dropColumn('phone');
        $table->dropColumn('address');
    }
}
