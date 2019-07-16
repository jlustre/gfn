<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('spousename')->nullable();
            $table->integer('is_married')->nullable();
            $table->integer('nbr_kids')->nullable();
            $table->string('source')->nullable();
            $table->string('phone')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('call_best_time')->nullable();
            $table->string('email')->nullable();
            $table->string('hot_buttons')->nullable();
            $table->string('company')->nullable();
            $table->string('profession')->nullable();
            $table->string('common_ground')->nullable();
            $table->string('interests')->nullable();
            $table->string('birthday')->nullable();
            $table->string('city')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('timezone_id')->nullable();
            $table->text('other_info')->nullable();
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('prospects');
    }
}
