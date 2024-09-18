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
        Schema::dropIfExists('districts');
        Schema::create('districts', function (Blueprint $table) {
            $table->string('id', 10);
            $table->string('name');
            $table->string('city_id', 10); // ID của Thành phố hoặc tỉnh
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); // Khóa ngoại liên kết với bảng `districts`
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
