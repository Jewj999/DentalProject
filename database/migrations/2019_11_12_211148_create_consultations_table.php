<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment', 500)->nullable();
            $table->unsignedBigInteger('turn_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('turn_id')->references('id')->on('turns')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('consultation_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
