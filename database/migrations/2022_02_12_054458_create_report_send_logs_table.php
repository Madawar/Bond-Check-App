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
        Schema::create('report_send_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airline_id');
            $table->date('for_date');
            $table->date('send_date');
            $table->string('filename');
            $table->foreign('airline_id')->references('id')->on('airlines');
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
        Schema::dropIfExists('report_send_logs');
    }
};
