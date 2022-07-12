<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->string('doctor_id');
            $table->string('doctor_name');
            $table->string('doctor_email')->unique();
            $table->string('doctor_pass');
            $table->string('doctor_gender');
            $table->string('doctor_degree');
            $table->string('doctor_dp');
            $table->string('doctor_type');
            $table->string('doctor_specialty');
            $table->primary('doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
