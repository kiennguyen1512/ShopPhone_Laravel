<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('mahd');
            $table->string('hoten');
            $table->text('diachi');
            $table->string('email');
            $table->text('ghichu');
            $table->string('dienthoai');
            $table->integer('httt');
            $table->dateTime('ngaylap');
            $table->decimal('tongtien');
            $table->integer('trangthai');
            $table->unsignedBigInteger('id_khuyenmai')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_khuyenmai')->references('id')->on('coupons');
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
        Schema::dropIfExists('orders');
    }
};
