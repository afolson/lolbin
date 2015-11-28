<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * This is a hot ass mess. Create a schema, add a binary UUID, set as pk.
         */
        Schema::create('pastes', function (Blueprint $table) {
            //$table->increments('id');
            $table->text('body');
            $table->string('language');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE pastes ADD COLUMN id BINARY(32)');

        Schema::table('pastes', function($table)
        {
            $table->primary('id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pastes');
    }
}
