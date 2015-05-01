<?php namespace Boletas\Repos;

use Boletas\Ciclo;
use Blog\Repos\BaseRepo;

class CicloRepo extends BaseRepo{

	public function getModel()
    {
        return new Ciclo;
    }  


	public function getAll(){

		return Ciclo::where('Status','=','A')
					->orWhere('Status','=','B')
					->select('IdCiclo','Status','Nombre','Inicio','Fin')
					->orderBy('idCiclo','desc');
	}


	public function getNew(){

		return Ciclo::where('Status','=','A')
					->select('idCiclo','Status','Nombre','Inicio','Fin')
					->limit(1);
	}



	public function newItem($datos){

		//Actualizamos los ciclos
		$loops = Ciclo::where('Status','=','A')
						->update(['Status' => 'B']);


		$loop 			=  new Ciclo();
		$loop->Nombre 	= $datos['Nombre'];
		$loop->Inicio    = $datos['Inicio'];
		$loop->Fin   	= $datos['Fin'];
		$loop->Tipo 		= 'A';
		$loop->Status 	= 'A';
		$loop->save();




	}

	





}