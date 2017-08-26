<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class SuperAdminController extends Controller {

	public function index() {
		$admin_id = Session::get('admin_id');

		if (isset($admin_id)) {
			$dashboard_content = view('admin.pages.dashboard_content');
			return view('admin.admin_master')
				->with('admin_content', $dashboard_content);

		} else {
			return Redirect::to('admin-panel')->send();
		}

	}

	public function logout() {

		Session::put('admin_name', NULL);
		Session::put('admin_id', NULL);
		Session::put('message', 'You are Successfully Logged Out!');
		return Redirect::to('admin-panel')->send();

	}

	public function add_category() {

		$category_info = DB::table('category')
			->where('publication_status', 1)
			->get();
		$add_category = view('admin.pages.add_category')
			->with('category_info', $category_info);

		return view('admin.admin_master')
			->with('admin_content', $add_category);
	}

	public function save_category(Request $request) {
		$data = array();

		$data['category_name'] = $request->category_name;
		$data['parent_id'] = $request->parent_id;
		$data['category_description'] = $request->category_description;
		$data['publication_status'] = $request->publication_status;

		//image upload code
		$image = $request->file('category_image');
		if ($image) {
			// Laravel built-in function
			$image_name = str_random(20);
			//built-in function to get the uploaded file ext.
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name . '.' . $ext;
			$upload_path = 'public/category-images/'; //Settig up the path to save file.
			$image_url = $upload_path . $image_full_name;
			$success = $image->move($upload_path, $image_full_name);
			if ($success) {
				$data['category_image'] = $image_url; //saving only the image URL in DB
				DB::table('category')->insert($data);
				Session::put('message', 'Saved Category information successfully');
				return Redirect::to('/add_category');
			}
		} else {
			DB::table('category')->insert($data);
			Session::put('message', 'Saved category information successfully');
			return Redirect::to('/add_category');
		}
	}

	public function manage_category() {

		$category_info = DB::table('category')->get();

		$manage_category = view('admin.pages.manage_category')
			->with('all_category_info', $category_info);

		return view('admin.admin_master')->with('admin_content', $manage_category);

	}

	public function unpublished_category($category_id) {
		DB::table('category')
			->where('category_id', $category_id)
			->update(['publication_status' => 0]);

		return Redirect::to('/manage-category');
	}

	public function published_category($category_id) {
		DB::table('category')
			->where('category_id', $category_id)
			->update(['publication_status' => 1]);

		return Redirect::to('/manage-category');
	}

	/*WARNING SOFT DELETE IS DISbled now */
	public function delete_category($category_id) {
		DB::table('category')
			->where('category_id', $category_id)
			->delete();

		return Redirect::to('/manage-category');
	}
	public function edit_category($category_id) {
		$category_info = DB::table('category')
			->where('category_id', $category_id)
			->first();

		$edit_category = view('admin.pages.edit_category')
			->with('category_info', $category_info);

		return view('admin.admin_master')
			->with('admin_content', $edit_category);
	}

	public function update_category(Request $request) {
		$category_id = $request->category_id;
		DB::table('category')
			->where('category_id', $category_id)
			->get();

		$data = array();
		$category_id = $request->category_id;
		$data['category_name'] = $request->category_name;
		$data['category_description'] = $request->category_description;
		$data['category_image'] = $request->category_image;
		$data['publication_status'] = $request->publication_status;
		//image upload code
		$image = $request->file('category_image');
		if ($image) {
			// Laravel built-in function
			$image_name = str_random(20);
			//built-in function to get the uploaded file ext.
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name . '.' . $ext;
			$upload_path = 'public/category-images/'; //Settig up the path to save file.
			$image_url = $upload_path . $image_full_name;
			$success = $image->move($upload_path, $image_full_name);
			if ($success) {
				$data['category_image'] = $image_url; //saving only the image URL in DB
				DB::table('category')
					->where('category_id', $category_id)
					->update($data);
				Session::put('message', 'Updated Category information successfully');
				return Redirect::to('/edit-category/' . $category_id);
			}
		} else {
			DB::table('category')
				->where('category_id', $category_id)
				->update($data);
			Session::put('message', 'Updated category information successfully');
			return Redirect::to('/edit-category/' . $category_id);
		}

	}

	public function add_product() {

		$category_info = DB::table('category')
			->where('publication_status', 1)
			->get();
		$manu_info = DB::table('manufacturer')
			->where('publication_status', 1)
			->get();

		$add_product = view('admin.pages.add_product')
			->with('category_info', $category_info)
			->with('manu_info', $manu_info);

		return view('admin.admin_master')
			->with('admin_content', $add_product);
	}

	public function save_product(Request $request) {
		$data = array();

		$data['product_name'] = $request->product_name;
		$data['category_id'] = $request->category_id;
		$data['manufacturer_name'] = $request->manufacturer_name;
		$data['product_description'] = $request->product_description;
		$data['product_price'] = $request->product_price;
		$data['product_quantity'] = $request->product_quantity;
		$data['publication_status'] = $request->publication_status;

		//image upload code
		$image = $request->file('product_image');
		if ($image) {
			// Laravel built-in function
			$image_name = str_random(20);
			//built-in function to get the uploaded file ext.
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name . '.' . $ext;
			$upload_path = 'public/product_images/'; //Settig up the path to save file.
			$image_url = $upload_path . $image_full_name;
			$success = $image->move($upload_path, $image_full_name);
			if ($success) {
				$data['product_image'] = $image_url; //saving only the image URL in DB
				DB::table('product')->insert($data);
				Session::put('message', 'Saved Product information successfully');
				return Redirect::to('/add-product');
			}
		} else {
			DB::table('product')->insert($data);
			Session::put('message', 'Saved Product information successfully');
			return Redirect::to('/add-product');
		}
	}
	public function manage_product() {

		$product_info = DB::table('product')->get();

		$manage_product = view('admin.pages.manage_products')
			->with('all_product_info', $product_info);

		return view('admin.admin_master')->with('admin_content', $manage_product);

	}

	public function unpublished_product($product_id) {
		DB::table('product')
			->where('product_id', $product_id)
			->update(['publication_status' => 0]);

		return Redirect::to('/manage-product');
	}

	public function published_product($product_id) {
		DB::table('product')
			->where('product_id', $product_id)
			->update(['publication_status' => 1]);

		return Redirect::to('/manage-product');
	}

	/*WARNING SOFT DELETE IS DISbled now */
	public function delete_product($product_id) {
		DB::table('product')
			->where('product_id', $product_id)
			->delete();

		return Redirect::to('/manage-product');
	}
	public function edit_product($product_id) {
		$product_info = DB::table('product')
			->where('product_id', $product_id)
			->first();

		$edit_product = view('admin.pages.edit_product')
			->with('product_info', $product_info);

		return view('admin.admin_master')
			->with('admin_content', $edit_product);
	}

	/* MANUFACTURER CRUD CODES */
	public function add_manufacturer() {

		$add_manu = view('admin.pages.add_manufacturer');

		return view('admin.admin_master')
			->with('admin_content', $add_manu);

	}
	public function save_manufacturer(Request $request) {

		$data = array();
		$data['manufacturer_name'] = $request->manufacturer_name;
		$data['manufacturer_description'] = $request->manufacturer_description;
		$data['publication_status'] = $request->publication_status;

		DB::table('manufacturer')
			->insert($data);
		Session::put('message', 'Saved Manufacturer information successfully');

		return Redirect::to('add-manufacturer');
	}

	public function manage_manufacturer() {

		$manu_info = DB::table('manufacturer')->get();

		$manage_manu = view('admin.pages.manage_manufacturer')
			->with('all_manu_info', $manu_info);

		return view('admin.admin_master')->with('admin_content', $manage_manu);

	}

	public function unpublished_manufacturer($manufacturer_id) {
		DB::table('manufacturer')
			->where('manufacturer_id', $manufacturer_id)
			->update(['publication_status' => 0]);

		return Redirect::to('/manage-manufacturer');
	}

	public function published_manufacturer($manufacturer_id) {
		DB::table('manufacturer')
			->where('manufacturer_id', $manufacturer_id)
			->update(['publication_status' => 1]);

		return Redirect::to('/manage-manufacturer');
	}

	public function edit_manufacturer($manufacturer_id) {
		$manu_info = DB::table('manufacturer')
			->where('manufacturer_id', $manufacturer_id)
			->first();

		$edit_manu = view('admin.pages.edit_manufacturer')
			->with('manu_info', $manu_info);

		return view('admin.admin_master')
			->with('admin_content', $edit_manu);
	}

	public function update_manufacturer(Request $request) {

		$data = array();
		$manu_id = $request->manufacturer_id;
		$data['manufacturer_name'] = $request->manufacturer_name;
		$data['manufacturer_description'] = $request->manufacturer_description;
		$data['publication_status'] = $request->publication_status;
		DB::table('manufacturer')
			->where('manufacturer_id', $manu_id)
			->update($data);

		Session::put('message', 'Updated manufacturer information successfully');
		return Redirect::to('/edit-manufacturer/' . $manu_id);

	}

	/*WARNING SOFT DELETE IS DISbled now */
	public function delete_manufacturer($manufacturer_id) {
		DB::table('manufacturer')
			->where('manufacturer_id', $manufacturer_id)
			->delete();

		return Redirect::to('/manage-manufacturer');
	}

}
