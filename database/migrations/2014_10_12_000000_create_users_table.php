<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->enum('role',['admin','user'])->default('user');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name'=>'Nguyễn Khánh',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456'),
            'photo'=>'/storage/photos/1/Users/member-2.jpg',
            'role'=>'admin',
            'status'=>'active',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
