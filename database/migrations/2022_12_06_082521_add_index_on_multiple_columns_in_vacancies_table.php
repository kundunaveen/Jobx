<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexOnMultipleColumnsInVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('job_title')->index()->change();
            $table->string('department')->index()->change();
            $table->string('job_role')->index()->change();
            $table->string('location')->index()->change();
            $table->unsignedBigInteger('country')->index()->change();
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
            $table->dropIndex(['job_title', 'department', 'job_role', 'location', 'country']);
        });
    }
}
