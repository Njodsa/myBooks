<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
          /*
          `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `authorname` varchar(30) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `genres` varchar(50) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  */
            $table->id();
            $table->string('name');
            $table->string('authorname');
            $table->string('isbn');
            $table->string('genres');
            $table->double('price');
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
        Schema::dropIfExists('books');
    }
}
