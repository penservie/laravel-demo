<?php

class AthomesController extends \BaseController {

	public $restful = true;
        protected $athome;

        public function __construct(Athomes $athome){
            $this->athome = $athome;
        }

        /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $maxid = Athomes::all();
            return Response::json($maxid);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $maxid = Athomes::max('id');
	    //return Response::json($maxid);
	    return View::make('athome.create')->with('maxid',$maxid);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    //validate
        $rules = array(
            'led_one' => 'required',
            'sensors_one' => 'required|numeric|Min:-50|Max:80',
            'sensors_two' => 'required|numeric|Min:-50|Max:80',
            'temperature' => 'required|numeric|Min:-50|Max:80',
	    );
	    $validator = Validator::make(Input::all(),$rules);

	    if($validator->fails()){
	        return Redirect::to('athome/create')->withErrors($validator)->withInput(Input::except('password'));
	    }else{
	        //store
		$nerd = new Athomes;
		$nerd->sensors_one = Input::get('sensors_one');
		$nerd->sensors_two = Input::get('sensors_two');
		$nerd->temperature = Input::get('temperature');
		$nerd->led_one     = Input::get("led_one");
		$nerd->save();

		Session::flash('message','Successfully created athome!');
		return Redirect::to('athome');
	    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $maxid = Athomes::find($id);
	    //$maxid = Athomes::where('id'.'='.$id)->select('id','temperature','sensors_one','sensors_two','led_one')->get();
	    return Response::json($maxid);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $athome = Athomes::find($id);
	    return View::make('athome.edit')->with('athome',$athome);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	    $rules = array(
	        'led_one' => 'required',
	        'sensors_one' => 'required|numeric|Min:-50|Max:80',
		'sensors_two' => 'required|numeric|Min:-50|Max:80',
		'temperature' => 'required|numeric|Min:-50|Max:80',
	    );
	    $validator = Validator::make(Input::all(),$rules);

	    if($validator->fails()){
	        return Redirect::to('athome/'.$id.'/edit')->withErrors($validator);
	    }else{
	        //store
		$nerd = Athomes::find($id);
		$nerd->sensors_one = Input::get('sensors_one');
		$nerd->sensors_two = Input::get('sensors_two');
		$nerd->temperature = Input::get('temperature');
		$nerd->led_one     = Input::get('led_one');
		$nerd->save();

		//redirect
		Session::flash('message','Successfully created athome!');
		return Redirect::to('athome');
	    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    $athome = Athomes::find($id);
	    $athome->delete();
	    if(is_null($athome)){
	        return Response::json('Todo not found',404);
	    }

	    //redirect
	    Session::flash('message','Successfully deleted the nerd!');
	    return Redirect::to('athome');
	}


}
