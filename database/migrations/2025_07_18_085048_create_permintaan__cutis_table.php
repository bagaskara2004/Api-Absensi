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
        Schema::create('permintaan_cuti', function (Blueprint $collection) {
            $collection->index('nip');
            $collection->index('jenis');
            $collection->index('tanggal_mulai');
            $collection->index('tanggal_selesai');
            $collection->string('alasan');
            $collection->index('status');
            $collection->timestamps();
            $collection->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_cuti');
    }
};
