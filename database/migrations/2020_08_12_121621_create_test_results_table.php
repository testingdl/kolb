<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('learning_style_id');
            $table->string('token')->unique();
            $table->tinyInteger('ec')
                ->unsigned();
            $table->tinyInteger('or')
                ->unsigned();
            $table->tinyInteger('ca')
                ->unsigned();
            $table->tinyInteger('ea')
                ->unsigned();
            $table->timestamps();

            $table->foreign('test_id')
                ->references('id')
                ->on('tests');
            
            $table->foreign('learning_style_id')
                ->references('id')
                ->on('learning_styles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}
