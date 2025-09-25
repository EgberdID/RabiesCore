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
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subdis_id');
            $table->string('village_id', 20); // 71.71.01.1001.01
            $table->string('name', 30);
            $table->timestamps();

            $table->foreign('subdis_id')->references('id')->on('sub_dis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villages');
    }
};
