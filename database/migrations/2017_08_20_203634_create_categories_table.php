<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('category', function (Blueprint $table) {
			$table->increments('category_id');
			$table->string('category_name', 50);
			$table->text('category_description');
			$table->tinyInteger('parent_id');
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
		Schema::dropIfExists('category');
	}
}
