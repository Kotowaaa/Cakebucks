<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kue');
            $table->string('stok_kue');
            $table->enum('jenis_kue', ['Kering', 'Basah']);
            $table->date('tanggal_expired');
            $table->string('harga_kue');
            $table->string('gambar_kue')->nullable();
            $table->text('deskripsi_kue');
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
        Schema::dropIfExists('stoks');
    }
}
