<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders', function (Blueprint $table) {
			$table->increments('order_id');
			$table->integer('user_id');
			// $table->foreign('user_id')
			// 	->references('user_id')
			// 	->on('users')
			// 	->onDelete('cascade');
			$table->text('shipping_address', 250);
			$table->float('total_amount');
			$table->text('status');
			$table->string('payment_method');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('orders');
	}
}
