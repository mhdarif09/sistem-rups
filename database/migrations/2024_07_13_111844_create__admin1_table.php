<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin1s', function (Blueprint $table) {
            $table->id();
            $table->string('Arahan'); // Tambahkan kolom Arahan
            $table->string('PIC');
            $table->text('Hasil_tindak_lanjut')->nullable();
            $table->enum('Status', ['Belum ditindak lanjut', 'Sudah ditindak lanjut'])->default('Belum ditindak lanjut');
            $table->text('Keterangan')->nullable();
            $table->string('Bukti')->nullable();
            $table->boolean('approve')->default(false); // Tambah kolom approve
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_admin1');
    }
};
