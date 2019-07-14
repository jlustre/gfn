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
            $table->integer('role_id');
            $table->integer('is_active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('interests')->nullable();
            $table->string('description')->nullable();
            $table->integer('rank_id')->nullable();
            $table->integer('address_id')->nullable();
            $table->integer('picture_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('timezone_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

            // Insert new user
            DB::table('users')->insert(
                array(
                    'sponsor' => 'jkalliance',
                    'username' => 'jlustre',
                    'role_id' => 1,
                    'is_active' => 1,
                    'email' => 'jclustre@gmail.com',
                    'password' =>  Hash::make('jocolus7'),
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now()
                )
            );

            $last_id = DB::getPdo()->lastInsertId();

            // Insert new profile
            DB::table('profiles')->insert(
                array(
                    'user_id' => $last_id,
                    'firstname' => 'Joey',
                    'lastname' => 'Lustre',
                    'created_at' => now(),
                    'updated_at' => now()
                )
            );

            // Insert new user
            DB::table('users')->insert(
                array(
                    'sponsor' => 'jlustre',
                    'username' => 'jblustre',
                    'role_id' => 2,
                    'is_active' => 1,
                    'email' => 'jblustre@gmail.com',
                    'password' =>  Hash::make('jocolus7'),
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now()
                )
            );

            $last_id = DB::getPdo()->lastInsertId();

            // Insert new profile
            DB::table('profiles')->insert(
                array(
                    'user_id' => $last_id,
                    'firstname' => 'Joane',
                    'lastname' => 'Lustre',
                    'created_at' => now(),
                    'updated_at' => now()
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
