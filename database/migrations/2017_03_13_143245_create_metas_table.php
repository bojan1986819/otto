<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('metas')) {

        }else {
            Schema::create('metas', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parent_id')->unsigned();
                $table->string('parent_type');
                $table->string('key');
                $table->string('value');
                $table->timestamps();

                $table->unique(['parent_id', 'parent_type', 'key']);
                $table->index(['parent_id', 'parent_type']);

//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
//            $table->foreign(['parent_id','parent_type'])->references('id')->on('events')->onDelete('cascade');
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
        Schema::dropIfExists('metas');
    }
}
