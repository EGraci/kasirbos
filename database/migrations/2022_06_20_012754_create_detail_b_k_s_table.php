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
            $table->string('kd_bkeluar', 500);
            $table->bigInteger('kd_menu');
            $table->primary(array('kd_bkeluar','kd_menu'));  
            $table->integer('qty');
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
