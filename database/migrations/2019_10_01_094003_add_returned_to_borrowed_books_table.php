<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReturnedToBorrowedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrowed_books', function (Blueprint $table) {
            $table->dateTime('returned')->nullable();
            $table->enum('status',['borrowed','returned','lost'])->default('borrowed');
            $table->date('due_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrowed_books', function (Blueprint $table) {
            //
        });
    }
}
