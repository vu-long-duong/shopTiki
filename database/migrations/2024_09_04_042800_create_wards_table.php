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
        Schema::dropIfExists('wards');
        Schema::create('wards', function (Blueprint $table) {
            $table->string('id', 10);
            $table->string('name');
            $table->string('district_id', 10); // ID của quận hoặc huyện
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade'); // Khóa ngoại liên kết với bảng `districts`
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wards');
    }
};
