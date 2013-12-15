<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			//needed to register
			$table->string('first_name'); 
			$table->string('last_name'); 

			$table->string('full_name')->nullable(); 

			$table->string('email');
			$table->string('password'); 
			
			//addible after the fact
			$table->string('major')->nullable(); 

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
		Schema::drop('users');
	}

}
