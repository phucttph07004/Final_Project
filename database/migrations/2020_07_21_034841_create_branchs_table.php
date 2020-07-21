<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('address');
            $table->string('branch_name');
            $table->integer('director_id')->unsigned();
            $table->foreign('director_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('teaching_assitant_id')->unsigned();
            $table->foreign('teaching_assitant_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('branchs');
    }
}
