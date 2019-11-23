<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailToothConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_tooth_consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tooth_id');
            $table->unsignedBigInteger('consultation_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->foreign('tooth_id')->references('id')->on('teeth')->onDelete('cascade');
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_tooth_consultations');
    }
}
