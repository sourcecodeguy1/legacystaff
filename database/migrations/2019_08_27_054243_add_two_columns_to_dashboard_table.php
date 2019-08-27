<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnsToDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dashboard_table', function (Blueprint $table) {
            // Add two additional columns
            $table->text('dashboard_card_links')->after('week_of_date');
            $table->text('dashboard_card_contacts')->after('dashboard_card_links');
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
            $table->dropColumn('dashboard_card_links');
            $table->dropColumn('dashboard_card_contacts');
        });
    }
}
