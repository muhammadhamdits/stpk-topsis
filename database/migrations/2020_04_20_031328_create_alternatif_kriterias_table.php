<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif_kriterias', function (Blueprint $table) {
            $table->bigInteger('alternatif_id')->unsigned();
            $table->bigInteger('kriteria_id')->unsigned();
            $table->bigInteger('kategori_id')->unsigned();
            $table->foreign('alternatif_id')->references('id')->on('alternatifs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['alternatif_id', 'kriteria_id']);
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
        Schema::dropIfExists('alternatif_kriterias');
    }
}
