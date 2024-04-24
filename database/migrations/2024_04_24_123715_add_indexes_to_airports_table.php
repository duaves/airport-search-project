<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('airports', function (Blueprint $table) {
        $table->index('code');
        $table->index('city_name_ru');
        $table->index('city_name_en');
        $table->index('airport_name_ru');
        $table->index('airport_name_en');

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airports', function (Blueprint $table) {
            //
        });
    }
};
