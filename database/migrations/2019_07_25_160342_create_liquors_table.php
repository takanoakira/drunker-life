<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\PrefectureCode;

class CreateLiquorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('maker_id');
            $table->integer('price');
            $table->integer('alcohol');
            $table->integer('acidity');
            $table->integer('liquor_score');
            $table->enum('production_area', PrefectureCode::getValues());
            $table->string('raw_rice');
            $table->integer('milling_rate');
            $table->text('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liquors');
    }
}
