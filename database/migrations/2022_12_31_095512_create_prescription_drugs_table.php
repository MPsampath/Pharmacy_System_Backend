<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_drugs', function (Blueprint $table) {
            $table->tinyIncrements('rid')->comment('Record Id');
            $table->smallInteger('pri')->unsigned()->index()->comment('Prescription Id');
            $table->integer('dri')->unsigned()->index()->comment('Drug Id');
            $table->smallInteger('qty')->nullable()->default(null)->comment('1-Mg,2-G,3-Ml,4-L');

              //Relation ships
              $table->foreign('pri')->references('pri')->on('prescriptions')->onDelete('Restrict')->onUpdate('Cascade');
              $table->foreign('dri')->references('dri')->on('drugs')->onDelete('Restrict')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_drugs');
    }
}
