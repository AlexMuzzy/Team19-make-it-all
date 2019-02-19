<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employeeID');
            $table->string('fname');
            $table->string('sname');
            $table->string('category');
            $table->string('issue');
            $table->string('priority');
            $table->text('summary');
            $table->boolean('solved')->default(false);
            $table->text('solvedtext');
            $table->integer('assignedTo');
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
        Schema::dropIfExists('cases');
    }
}
