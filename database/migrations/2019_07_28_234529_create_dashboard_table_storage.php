<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardTableStorage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Monday');
            $table->string('Tuesday');
            $table->string('Wednesday');
            $table->string('Thursday');
            $table->string('Friday');
            $table->string('Saturday');
            $table->string('message_board');
            $table->text('quote_message');
            $table->string('staff_picture_title');
            $table->string('staff_picture_year');
            $table->string('current_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard_table');
    }
}
