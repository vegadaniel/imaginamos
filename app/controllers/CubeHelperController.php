<?php

class CubeHelperController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postTests()
	{
		$numTests = Input::get('numTests');

		//dd($numTests);

		return View::make('pruebas')
						->with('numTests', $numTests);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreartest()
	{
		$numberTest = Input::get('numberTest');
		$infotest = Input::get('infotest');

		//dd($numberTest);

		$infotest = explode(' ', $infotest);
		
		$n_value = $infotest[0];
		$numberQueries = $infotest[1];
		
		Cube::truncate();

		for($x = 1; $x <= $n_value; $x++){
            for($y = 1; $y <= $n_value; $y++){
                for($z = 1; $z <= $n_value; $z++){
                	
                	$cube = new Cube;

                	$cube->x = $x;
                	$cube->y = $y;
                	$cube->z = $z;
                	$cube->w = 0;
                	$cube->save();
                   
                }
            }   
        }

        return View::make('consultas')
						->with('numberTest', $numberTest)
						->with('numberQueries', $numberQueries)
						->with('status', 'ok_create');
   
	}


		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postRealizarconsulta()
	{
		
		$numberQueries = Input::get('numberQueries');
		$numberTest = Input::get('numberTest');

		$tipoConsulta = Input::get('tipoConsulta');
		$consulta = Input::get('consulta');

		$consulta = explode(' ', $consulta);
		//dd($tipoConsulta);

		if($tipoConsulta == 1){
			$x = $consulta[0];
			$y = $consulta[1];
			$z = $consulta[2];
			$w = $consulta[3];

			DB::table('cube')	->where('x', $x)
								->where('y', $y)
								->where('z', $z)
            					->update(array('w' => $w));

	        $numberQueries = $numberQueries - 1;

	        return View::make('consultas')
							->with('numberTest', $numberTest)
							->with('numberQueries', $numberQueries)
							->with('status', 'ok_update');
		}elseif($tipoConsulta == 2){

			$sum = 0;
			$x1 = $consulta[0];
			$y1 = $consulta[1];
			$z1 = $consulta[2];
			$x2 = $consulta[3];
			$y2 = $consulta[4];
			$z2 = $consulta[5];

			for($x = $x1; $x <= $x2; $x++){
	            for($y = $y1; $y <= $y2; $y++){
	                for($z = $z1; $z <= $z2; $z++){
	                    
		                $w_querys =  DB::table('cube')	->select('w')
		                								->where('x', $x)
														->where('y', $y)
														->where('z', $z)
														->get();
						foreach($w_querys as $w_query){
							$sum = $sum + $w_query->w;

						}
	                }
	            }   
        	}
        	$numberQueries = $numberQueries - 1;
        	return View::make('consultas')
							->with('numberTest', $numberTest)
							->with('numberQueries', $numberQueries)
							->with('sum', $sum)
							->with('status', 'ok_select');

		}

		

       
	}



}
