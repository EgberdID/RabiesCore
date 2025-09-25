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
        Schema::create('sub_dis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');   
            $table->string('subdis_id', 20);   //71.71.01.1001
            $table->string('name', 30);
            $table->string('lat', 30);
            $table->string('lng', 30);
            $table->timestamps();
           
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_dis');
    }
};
