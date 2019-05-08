<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->Increments('id', true);
            $table->string('name');
            $table->mediumInteger('amount');
            $table->string('date');
            $table->integer('expense_type_id')->unsigned();
            //$table->foreign('expenseType_id')->references('id')->on('expense_types');
            $table->string('note');
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

        });

        Schema::table('expenses', function(Blueprint $table){
            $table->foreign('expense_type_id')->references('id')->on('expense_types');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
