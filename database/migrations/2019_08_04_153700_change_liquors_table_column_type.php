<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLiquorsTableColumnType extends Migration
{
    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('liquors', function (Blueprint $table) {
            $table->decimal('alcohol', 4, 1)->change();
            $table->decimal('acidity', 4, 1)->change();
            $table->decimal('liquor_score', 5, 1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('liquors', function (Blueprint $table) {
            $table->integer('alcohol')->change();
            $table->integer('acidity')->change();
            $table->integer('liquor_score')->change();
        });
    }
}
