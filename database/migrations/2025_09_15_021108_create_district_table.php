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
        Schema::create('district', function (Blueprint $table) {
            $table->id();
            $table->string('city_id', 1);
            $table->string('district_id', 10 ); //71.71.01
            $table->string('name', 30);
            $table->timestamps();

            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district');
    }
};
