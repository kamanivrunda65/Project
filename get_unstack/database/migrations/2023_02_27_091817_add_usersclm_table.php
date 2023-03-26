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
        Schema::table('users', function (Blueprint $table) {
            $table->text('profile_pic',100)->nullable();
            $table->text('country',50)->nullable();
            $table->text('objective',600)->nullable();
            $table->text('web_link',50)->nullable();
            $table->text('facebook_link',50)->nullable();
            $table->text('youtube_link',50)->nullable();
            $table->text('github_link',50)->nullable();
            $table->text('twitter_link',50)->nullable();
            $table->text('insta_link',50)->nullable();
            $table->bigInteger('total_question')->default(0);
            $table->bigInteger('Total_answer')->default(0);
            $table->bigInteger('accepted_answer')->default(0);
            $table->bigInteger('points')->default(0);
            $table->integer('role_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
