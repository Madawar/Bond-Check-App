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
        Schema::create('bond_checks', function (Blueprint $table) {
            $table->id();
            $table->string('awb_no');
            $table->unsignedBigInteger('airline_id');
            $table->unsignedBigInteger('awb_id');
            $table->string('location');
            $table->date('date_captured');
            $table->string('aod')->nullable();
            $table->string('nop')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('shc')->nullable();
            $table->string('remarks')->nullable();
            $table->string('captured_by')->nullable();
            $table->foreign('airline_id')->references('id')->on('airlines');
            $table->foreign('awb_id')->references('id')->on('awbs');
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
        Schema::dropIfExists('bond_checks');
    }
};
