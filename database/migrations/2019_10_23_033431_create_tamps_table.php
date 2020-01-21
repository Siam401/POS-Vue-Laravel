<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stockid');
            $table->string('name');
            $table->float('getprice');
            $table->float('sellprice');
            $table->integer('quantity');
            $table->integer('maxquantity');
            $table->integer('categoryid');
            $table->integer('companyid');
            $table->string('barcode');
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
        Schema::dropIfExists('tamps');
    }
}
