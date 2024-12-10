<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCaretakerLogsToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->boolean('morning_med_given')->default(false);
            $table->timestamp('morning_med_time')->nullable();
            $table->boolean('afternoon_med_given')->default(false);
            $table->timestamp('afternoon_med_time')->nullable();
            $table->boolean('night_med_given')->default(false);
            $table->timestamp('night_med_time')->nullable();
            $table->boolean('food_given')->default(false);
            $table->timestamp('food_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('morning_med_given');
            $table->dropColumn('morning_med_time');
            $table->dropColumn('afternoon_med_given');
            $table->dropColumn('afternoon_med_time');
            $table->dropColumn('night_med_given');
            $table->dropColumn('night_med_time');
            $table->dropColumn('food_given');
            $table->dropColumn('food_time');
        });
    }
}