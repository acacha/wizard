<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepWizardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_wizard', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wizard_id')->unsigned();
            $table->integer('step_id')->unsigned();

            $table->foreign('wizard_id')->references('id')->on('wizards')->onDelete('cascade');
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_wizard');
    }
}
