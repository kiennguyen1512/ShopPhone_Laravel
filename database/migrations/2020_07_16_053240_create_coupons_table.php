<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('tenkm');
            $table->text('photo')->nullable();
            $table->string('code');
            $table->string('mota');
            $table->dateTime('ngaybd');
            $table->dateTime('ngaykt');
            $table->decimal('giamgia');
            $table->integer('trangthai');
            // $table->string('code')->unique();
            // $table->enum('type',['fixed','percent'])->default('fixed');
            // $table->decimal('value',20,2);
            // $table->enum('status',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('coupons');
    }
}
