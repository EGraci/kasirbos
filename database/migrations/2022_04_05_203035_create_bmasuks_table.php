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
        Schema::create('bmasuk', function (Blueprint $table) {
            $table->id('id_bm');
            $table->bigInteger('id_bahan');
            $table->bigInteger('supplier');
            $table->integer('total');
            $table->integer('qty');
            $table->integer('denda');
            $table->date('tgl_masuk');
            $table->date('tgl_pesan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bmasuk');
    }
};
