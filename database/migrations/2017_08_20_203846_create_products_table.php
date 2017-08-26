<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product', function (Blueprint $table) {
			$table->increments('product_id');
			$table->string('product_name', 50);
			$table->text('product_description', 250);
			$table->float('product_price');
			$table->integer('product_quantity');
			$table->tinyInteger('publication_status');
			$table->tinyInteger('deletion_status');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('product');
	}
}
