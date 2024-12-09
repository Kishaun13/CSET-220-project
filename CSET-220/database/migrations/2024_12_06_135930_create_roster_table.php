<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRosterTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roster', function (Blueprint $table) {
            $table->id('roster_id'); // Auto-incrementing primary key
            $table->string('supervisor_name', 100);
            $table->string('doctor_name', 100);
            $table->unsignedBigInteger('doctor_id'); // Add doctor_id field
            $table->string('caregiver_1_name', 100);
            $table->string('caregiver_1_patient_group', 255)->nullable();
            $table->string('caregiver_2_name', 100)->nullable();
            $table->string('caregiver_2_patient_group', 255)->nullable();
            $table->string('caregiver3_name', 100)->nullable();
            $table->text('patient_group3')->nullable();
            $table->string('caregiver4_name', 100)->nullable();
            $table->text('patient_group4')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roster');
    }
}