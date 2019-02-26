<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeleteColoms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->boolean('delete')->default(0);
        });
        Schema::table('tobays', function (Blueprint $table) {
            $table->boolean('delete')->default(0);
        });
        Schema::table('to_reads', function (Blueprint $table) {
            $table->boolean('delete')->default(0);
        });
        Schema::table('to_travels', function (Blueprint $table) {
            $table->boolean('delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('delete');
        });
        Schema::table('tobays', function (Blueprint $table) {
            $table->dropColumn('delete');
        });
        Schema::table('to_reads', function (Blueprint $table) {
            $table->dropColumn('delete');
        });
        Schema::table('to_travels', function (Blueprint $table) {
            $table->dropColumn('delete');
        });
    }
}
