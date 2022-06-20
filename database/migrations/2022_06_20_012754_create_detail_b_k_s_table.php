<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailbk', function (Blueprint $table) {
            $table->bigInteger('kd_bkeluar');
            $table->bigInteger('kd_menu');
            $table->primary(array('kd_bkeluar','kd_menu'));  
            $table->decimal('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailbk');
    }
};
