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
        Schema::create('bite_cases', function (Blueprint $table) {
            $table->id();
            //data pasien
            $table->string('name', 100);
            $table->string('id_num', 50)->unique();
            $table->string('medrec_no',100);
            $table->text('address');
            $table->unsignedBigInteger('pas_dis_id');
            $table->unsignedBigInteger('pas_subdis_id');
            $table->string('job', 100);
            $table->string('age', 30);
            $table->string('phone', 30);
            //bite inci loc
            $table->string('case_day', 15);
            $table->string('case_time', 10);
            //foreign
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('sub_dis_id');
            $table->unsignedBigInteger('village_id');
            $table->string('animal_type', 100);
            $table->string('animal_stat', 100);
            $table->string('animal_con', 100);
            //injury detail
            $table->string('bite_mark', 100);
            $table->string('bite_coun', 2);
            $table->string('wound_ide', 100);
            $table->string('exp_cat', 150);
           //data hasil pemeriksaaan
            $table->string('inj_wash', 10)->nullable();
            //var
            $table->string('var_dos12', 10)->nullable();
            $table->string('var_dos3', 10)->nullable();
            $table->string('var_dos4', 10)->nullable();
            //sar
            $table->string('req', 10)->nullable();
            $table->string('inj_loc', 50)->nullable();
            //history vac
            $table->string('his_vac', 10)->nullable();
            $table->string('y_va', 10)->nullable();
            $table->string('treatment', 50)->nullable();
            $table->text('notes')->nullable();
            $table->string('user')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            //foreign gigitan
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
            $table->foreign('sub_dis_id')->references('id')->on('sub_dis')->onDelete('cascade');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
            //foreign datadiri pas
            $table->foreign('pas_dis_id')->references('id')->on('district')->onDelete('cascade');
            $table->foreign('pas_subdis_id')->references('id')->on('sub_dis')->onDelete('cascade');
            

    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bite_cases');
    }
};
