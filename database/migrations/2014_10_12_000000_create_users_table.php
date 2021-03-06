<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('role')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('position_id')
                  ->foreign('position_id')
                  ->references('id')
                  ->on('positions')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->rememberToken();
        });
        
        //add defaul value in user table
        DB::table('users')->insert(
            array(
                'firstname'        => 'admin',
                'lastname'         => 'user',
                'email'            => 'admin@example.com',
                'position_id'      => 1,
                'password'         => bcrypt('password'),
                'remember_token'   => Str::random(10)
            )
        );
        DB::table('users')->insert(
            array(
                'firstname'        => 'nomal',
                'lastname'         => 'user',
                'email'            => 'nomal@example.com',
                'position_id'      => 4,
                'password'         => bcrypt('password'),
                'remember_token'   => Str::random(10)
            )
        );
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
