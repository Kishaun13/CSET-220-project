<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToPatientsTable extends Migration
{
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('name')->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}