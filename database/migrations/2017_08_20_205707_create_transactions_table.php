<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('transactions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			// $table->foreign('order_id')
			// 	->references('order_id')
			// 	->on('orders')
			// 	->onDelete('cascade');
			$table->string('payment_method');
			// $table->foreign('payment_method')
			// 	->references('payment_method')
			// 	->on('orders')
			// 	->onDelete('cascade');
			$table->string('payment_details');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('ordered_transactions');
	}
}
