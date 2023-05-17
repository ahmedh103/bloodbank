<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->string('name');
			$table->integer('city_id')->unsigned();
			$table->string('password');
			$table->integer('blood_type_id')->unsigned();
			$table->string('last_donation_date');
			$table->string('d_o_b');
			$table->integer('pin_code')->nullable();
			$table->string('api_token',60)->uniqid()->nullable();
			$table->boolean("status")->default(false);
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}