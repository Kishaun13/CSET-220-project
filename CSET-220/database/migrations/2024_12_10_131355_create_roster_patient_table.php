<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRosterPatientTable extends Migration
{
    public function up()
    {
        Schema::create('roster_patient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roster_id');
            $table->unsignedBigInteger('patient_id');
            $table->timestamps();

            $table->foreign('roster_id')->references('roster_id')->on('roster')->onDelete('cascade');
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('roster_patient');
    }
}