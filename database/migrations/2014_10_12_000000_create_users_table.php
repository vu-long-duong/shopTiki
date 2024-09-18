<?php

use App\Models\User;
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
            $table->string('age')->nullable();//tuổi
            $table->string('phone')->nullable();//số điện thoại
            $table->text('address')->nullable();//địa chỉ chi tiết
            $table->string('ward_id')->nullable();//xã(phường)
            $table->string('district_id')->nullable();//quận(huyện)
            $table->string('city_id')->nullable();//thành phố(tỉnh)
            $table->string('postal_code')->nullable();//mã bưu điện
            $table->string('country')->nullable();//quốc gia
            $table->string('email')->unique();//gmail
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();//giới tính
            $table->string('date_of_birth')->nullable();//ngày tháng năm sinh
            $table->string('profile_picture')->nullable();// ảnh
            $table->string('google_id')->nullable()->unique();
            $table->string('facebook_id')->nullable()->unique();
            $table->string('provider')->nullable();
            $table->string('provider_token')->nullable();
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('role_id')->default(User::USER_ROLE);
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
