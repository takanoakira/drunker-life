<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquorTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquor_tag', function (Blueprint $table) {
            $table->bigInteger('liquor_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->primary(['liquor_id','tag_id']);
            $table->timestamps();
            
            $table->foreign('liquor_id')->references('id')->on('liquors')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liquor_tag');
    }
}
