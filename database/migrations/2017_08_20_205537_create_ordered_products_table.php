<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('ordered_products', function (Blueprint $table) {
			$table->integer('order_id');
			$table->integer('product_id');
			// $table->foreign('order_id')
			// 	->references('order_id')
			// 	->on('orders')
			// 	->onDelete('cascade');
			// $table->foreign('product_id')
			// 	->references('product_id')
			// 	->on('product')
			// 	->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('ordered_products');
	}
}
