<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->string('job_title');
            $table->string('company');
            $table->unsignedBigInteger('country_id')->index();
            $table->unsignedBigInteger('state_id')->index()->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->unsignedInteger('from_month');
            $table->year('from_year');
            $table->unsignedInteger('to_month')->nullable();
            $table->year('to_year')->nullable();
            $table->tinyInteger('is_work_here')->nullable();
            $table->longText('describe')->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
