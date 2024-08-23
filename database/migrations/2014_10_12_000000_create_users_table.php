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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');//tên
            $table->string('age');//tuổi
            $table->string('phone');//số điện thoại
            $table->text('address');//địa chỉ chi tiết
            $table->string('ward');//xã(phường)
            $table->string('district');//quận(huyện)
            $table->string('city');//thành phố(tỉnh)
            $table->string('postal_code');//mã bưu điện
            $table->string('country');//quốc gia
            $table->string('email')->unique();//gmail
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();//giới tính
            $table->string('date_of_birth');//ngày tháng năm sinh
            $table->string('profile_picture');// ảnh
            $table->string('google_id')->nullable()->unique();
            $table->string('facebook_id')->nullable()->unique();
            $table->string('provider')->nullable();
            $table->string('provider_token')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
