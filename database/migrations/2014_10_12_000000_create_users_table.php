<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

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
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('sponsor');
            $table->string('email')->unique();
            $table->integer('role_id')->default(1);
            $table->integer('is_active')->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->integer('address_id')->nullable();
            $table->integer('picture_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('timezone_id')->nullable();
            $table->timestamps();
        });

        // Insert new user
            DB::table('users')->insert(
                array(
                    'sponsor' => 'jkalliance',
                    'username' => 'jlustre',
                    'email' => 'jclustre@gmail.com',
                    'password' =>  Hash::make('jocolus7'),
                    'email_verified_at' => now()
                )
            );

            $id = DB::getPdo()->lastInsertId();

            // Insert new profile
            DB::table('profiles')->insert(
                array(
                    'user_id' => $id,
                    'firstname' => 'Joey',
                    'lastname' => 'Lustre',
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
        Schema::dropIfExists('profiles');
    }
}
