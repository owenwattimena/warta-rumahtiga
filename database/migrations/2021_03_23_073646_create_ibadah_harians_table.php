<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbadahHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibadah_harian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam');
            $table->string('kategori', 10);
            $table->string('posko', 100);
            $table->string('tempat_ibadah', 100);
            $table->string('pemimpin_ibadah', 50);
            $table->string('file_liturgi', 100)->nullable();
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
        Schema::dropIfExists('ibadah_harians');
    }
}