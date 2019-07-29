<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dashboard_table', function (Blueprint $table) {
            $table->string('week_of')->after('current_picture');
            $table->string('week_of_date')->after('week_of');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dashboard_table', function (Blueprint $table) {
            //
            $table->dropColumn('week_of');
            $table->dropColumn('week_of_date');
        });
    }
}
