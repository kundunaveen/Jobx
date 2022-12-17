<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThreeSixtyInVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('three_sixty')->nullable();
            $table->string('company_employee_interview')->nullable();
            $table->string('dl_required')->nullable();
            $table->integer('education')->nullable();
            $table->string('languages')->nullable();
            $table->string('company_size')->nullable();
            $table->string('notification_type')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            //
        });
    }
}
