<?php namespace Notas\Repos;

use Notas\Periodos;
use Blog\Repos\BaseRepo;

class PeriodoRepo extends BaseRepo{

	public function getModel()
    {
        return new Periodos;
    }  


	public function getAll(){

		return Periodos::where('Status','=','A')
						->orderBy('idPeriodo','desc');
	}

	public function getExcludeArray($list){

		$periodos =  Periodos::where('Status','=','A')
						->orderBy('idPeriodo','desc')
						->whereNotIn('idPeriodo',$list)
						->get();



		$periodList = array();

		foreach ($periodos as $periodo ) {
	
			$periodList[$periodo->idPeriodo] =  $periodo->Nombre;
		}

		return $periodList;

	}

	

	public function getById($id){

		return Periodos::where('idPeriodo','=',$id)
						->where('Status','=','A')
						->first();
	}

	public function remove($id){

		$item = Periodos::where('idPeriodo','=',$id)
						->where('Status','=','A')
						->first();
		$item->Status = 'B';
		$item->save();
	}


	public function newPeriod($datos){

		$periodo =  new Periodos();
		$periodo->Inicio 	= $datos['Inicio'];
		$periodo->Fin 		= $datos['Fin'];
		$periodo->Status 	= 'A';
		$periodo->Nombre 	= $datos['Nombre'];
		$periodo->save();
	}

	public function modifyPeriod($form){


		$item = Periodos::where('idPeriodo','=',$form['originalId'])
						->where('Status','=','A')
						->first();

		$item->Inicio 	= $form['Inicio'];
		$item->Fin 		= $form['Fin'];
		$item->Nombre 	= $form['Nombre'];
		$item->save();


	}




}