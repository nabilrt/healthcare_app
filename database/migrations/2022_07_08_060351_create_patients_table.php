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
        Schema::create('patients', function (Blueprint $table) {
            $table->string('patient_id');
            $table->string('patient_name');
            $table->string('patient_email')->unique();
            $table->string('patient_pass');
            $table->string('patient_gender');
            $table->date('patient_dob');
            $table->string('patient_dp');
            $table->string('membership_type');
            $table->primary('patient_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
