<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
                $categories = Category::all();
                $result = [];

                foreach($categories as $category) {
                        $result[] = $category->name;
                }

                return $result;
	}

}
