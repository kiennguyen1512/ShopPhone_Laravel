<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->text('short_des');
            $table->string('logo');
            $table->string('photo');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
        DB::table('settings')->insert([
            'description'=>'Chào mừng bạn đến shop quần áo của XSHOP',
            'short_des'=>'Lorem isum sjsjhsgs',
            'logo'=>'null',
            'photo'=>'null',
            'address'=>'65 Huỳnh Thúc Kháng,Phường Bến Nghé,Quận 1,TP Hồ Chí Minh',
            'phone'=>'0343754517',
            'email'=>'admin@gmail.com',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
