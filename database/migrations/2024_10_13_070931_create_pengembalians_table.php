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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();    
            $table->unsignedBigInteger("id_user");
            $table->unsignedBigInteger("id_item");
            $table->unsignedBigInteger("id_peminjaman");
            $table->string("bukti_img");
            $table->string("status")->default("pending");
            $table->timestamps();

            $table->foreign("id_user")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("id_item")->references("id_item")->on("items")->onDelete('cascade');
            $table->foreign("id_peminjaman")->references("id_peminjaman")->on("peminjamen")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
