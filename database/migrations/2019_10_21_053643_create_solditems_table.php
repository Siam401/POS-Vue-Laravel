<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolditemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solditems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('billno');
            $table->integer('quantity');
            $table->float('peritemprice');
            $table->float('discount');
            $table->string('paymenttype');
            $table->string('barcode');
            $table->integer('categoryid');
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
        Schema::dropIfExists('solditems');
    }
}
