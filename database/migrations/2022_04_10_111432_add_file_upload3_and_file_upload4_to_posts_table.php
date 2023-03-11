<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileUpload3AndFileUpload4ToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('file_upload3')->nullable();
            $table->string('file_upload4')->nullable();
            $table->string('file_upload5')->nullable();
            $table->string('file_upload6')->nullable();
            $table->string('file_upload7')->nullable();
            $table->string('file_upload8')->nullable();
            $table->string('file_upload9')->nullable();
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
            $table->dropColumn('file_upload3');
            $table->dropColumn('file_upload4');
            $table->dropColumn('file_upload5');
            $table->dropColumn('file_upload6');
            $table->dropColumn('file_upload7');
            $table->dropColumn('file_upload8');
            $table->dropColumn('file_upload9');
        });
    }
}
