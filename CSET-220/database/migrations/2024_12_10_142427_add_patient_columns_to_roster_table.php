<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientColumnsToRosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roster', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_2_id')->nullable();
            $table->unsignedBigInteger('patient_3_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roster', function (Blueprint $table) {
            $table->dropColumn('patient_2_id');
            $table->dropColumn('patient_3_id');
        });
    }
}