<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->foreign('role_id')->references('id')->on('roles');
        $table->foreign('ward_id')->references('id')->on('wards');
        $table->foreign('district_id')->references('id')->on('districts');
        $table->foreign('city_id')->references('id')->on('cities');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['role_id']);
        $table->dropForeign(['ward_id']);
        $table->dropForeign(['district_id']);
        $table->dropForeign(['city_id']);
    });
    }
};
