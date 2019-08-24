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
            $table->string('tab_1');
            $table->string('tab_2');
            $table->string('tab_3');
            $table->string('tab_4');
            $table->string('tab_5');
            $table->string('tab_6');
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
        });
    }
}
