<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnagicUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enagic_user_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('dist_id')->nullable();
            $table->integer('lock_dist_id')->nullable();
            $table->integer('lock_member_left')->nullable();
            $table->integer('lock_member_right')->nullable();
            $table->integer('placed_dist_id')->nullable();
            $table->integer('placed_member_left')->nullable();
            $table->integer('placed_member_right')->nullable();
            $table->date('signup_date')->nullable();
            $table->enum('status',array_keys(['P'=>'Placed', 'L'=>'Locked', 'N'=>'Not Placed']))->default('N')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('rank_id')->nullable();
            $table->dateTime('lock_timestamp')->nullable();
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
        Schema::dropIfExists('enagic_user_accounts');
    }
}
