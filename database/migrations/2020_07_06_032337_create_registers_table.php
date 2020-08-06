<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->text('address');
            $table->text('level');
            $table->text('note');

            // $table->integer('branch_id')->unsigned();
            // $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('cascade');
            $table->integer('is_active');
            $table->string('email',100)->unique();
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
        Schema::dropIfExists('registers');
    }
}
