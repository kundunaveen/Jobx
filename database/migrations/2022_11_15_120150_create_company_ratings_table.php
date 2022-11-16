<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_ratings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id')->index();
            $table->foreign('employee_id')->on('users')->references('id')->cascadeOnDelete();

            $table->unsignedBigInteger('company_id')->index();
            $table->foreign('company_id')->on('users')->references('id')->cascadeOnDelete();

            $table->unsignedSmallInteger('rating')->index();
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
        Schema::dropIfExists('company_ratings');
    }
}
