<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_jobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index()->comment('employee id');
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();

            $table->unsignedBigInteger('vacancy_id')->index();
            $table->foreign('vacancy_id')->on('vacancies')->references('id')->cascadeOnDelete();

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
        Schema::dropIfExists('favorite_jobs');
    }
}
