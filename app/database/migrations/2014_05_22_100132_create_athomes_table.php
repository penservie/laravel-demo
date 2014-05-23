<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthomesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('athomes', function(Blueprint $table)
		{
		    $table->increments("id");
		    $table->float("temperature");
		    $table->float("sensors_one");
		    $table->float("sensors_two");
		    $table->boolean("led_one");

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
		Schema::drop('athomes');
	}

}
