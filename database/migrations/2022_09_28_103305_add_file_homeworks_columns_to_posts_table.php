<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileHomeworksColumnsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('file_homework1')->nullable();
            $table->string('file_homework2')->nullable();
            $table->string('file_homework3')->nullable();
            $table->string('file_homework4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('file_homework1');
            $table->dropColumn('file_homework2');
            $table->dropColumn('file_homework3');
            $table->dropColumn('file_homework4');
        });
    }
}
