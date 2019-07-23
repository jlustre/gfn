<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnagicProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enagic_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('url')->nullable();
        });

        // Insert new user
            DB::table('enagic_products')->insert([
                array('name' => 'K8','title' => 'Leveluk K8'),
                array('name' => 'SD501','title' => 'Leveluk SD501'),
                array('name' => 'SD501P','title' => 'Leveluk SD501 Platinum'),
                array('name' => 'SD501U','title' => 'Leveluk SD501 Undersink'),
                array('name' => 'Super501','title' => 'Leveluk Super 501'),
                array('name' => 'JRII','title' => 'Leveluk JRII'),
                array('name' => 'R','title' => 'Leveluk R'),
                array('name' => 'Anespa','title' => 'Anespa DX'),
                array('name' => 'UkonZ','title' => 'Ukon Sigma'),
                array('name' => 'UkonZT','title' => 'Ukon Sigma Tea'),
                array('name' => 'UkonZS','title' => 'Ukon Sigma Soup'),
                array('name' => 'UkonDD','title' => 'Ukon Sigma DD'),
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enagic_products');
    }
}
