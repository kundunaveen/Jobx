<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsInProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable();
            $table->string('current_job_title')->nullable();
            $table->string('website_link')->nullable();
            $table->json('social_media_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('[date_of_birth]');
            $table->dropColumn('[current_job_title]');
            $table->dropColumn('[website_link]');
            $table->dropColumn('[social_media_link]');
        });
    }
}
