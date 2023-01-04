<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->smallIncrements('pri')->comment('Prescription Id');
            $table->string('prc')->comment('Prescription Code');
            $table->integer('uid')->unsigned()->index()->comment('User Id');
            $table->date('dte')->comment('Crate date');
            $table->smallInteger('sts')->comment('Status(1-Pending,2-Checked,3-Activated)');

            //Relation ships
            $table->foreign('uid')->references('uid')->on('users')->onDelete('Restrict')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
