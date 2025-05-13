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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id("id_peminjaman");
            $table->unsignedBigInteger("id_user");
            $table->unsignedBigInteger("id_item");
            $table->timestamp("tgl_pinjam")->default(now());
            $table->date("tgl_kembali")->nullable();
            $table->time("jam_kembali")->nullable();
            $table->integer("jumlah");
            $table->string("status")->default("pending");
            $table->timestamps();

            $table->foreign("id_user")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("id_item")->references("id_item")->on("items")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
