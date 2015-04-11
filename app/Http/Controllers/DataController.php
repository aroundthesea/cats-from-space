<?php namespace App\Http\Controllers;

use App\Data;
use App\Http\Requests;

use App\Tag;
use Illuminate\Http\Request;

class DataController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
        {
                return Data::all();

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * @param $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$lat = $request->input('lat');
		$lon = $request->input('lon');
		$zoom = $request->input('zoom');
		$date = $request->input('date');
		$tag = $request->input('tag', '');

                if ($tag === ''){
                        return response(['errorMessage' => 'Tag required']);
                }

                $tag_id = Tag::getTagIdByName($tag);

                $data = Data::create([
                        'lat' => $lat,
                        'lon' => $lon,
                        'zoom' => $zoom,
                        'date' => $date,
                        'tag_id' => $tag_id
                ]);

                return response($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $tagName
	 * @return Response
	 */
	public function show($tagName)
	{
                $tag = Tag::where(['name'=>$tagName])->first();
                return $tag->data;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
