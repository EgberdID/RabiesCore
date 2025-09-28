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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);    
            $table->string('nip', 50);    
            $table->string('id_num', 100);
            $table->text('address');    
            $table->string('faskes', 150);    
            $table->string('jobs', 100);    
            $table->string('var_dos12', 10)->nullable();
            $table->string('var_dos3', 10)->nullable();
            $table->string('var_dos4', 10)->nullable();
            $table->string('user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
