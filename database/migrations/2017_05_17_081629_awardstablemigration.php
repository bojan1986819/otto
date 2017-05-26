<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Awardstablemigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('metas')) {
            Schema::create('awards', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('project_id');
                $table->text('award')->nullable();
                $table->timestamps();

                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            });
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awards');
    }
}
