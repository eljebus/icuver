<?php namespace Boletas\Repos;

use Boletas\Reticula;
use Blog\Repos\BaseRepo;

class ReticulaRepo extends BaseRepo{

	public function getModel()
    {
        return new Reticula;
    }  


	public function getAll(){

		return Reticula::where('Status','=','A')->select('idReticula','Nombre','Tipo','Descripcion');
	}

	public function newItem($datos){

		$cat 				=  new Reticula();
		$cat->Nombre 		= $datos['Nombre'];
		$cat->Descripcion 	= $datos['Descripcion'];
		$cat->Status 		= 'A';
		$cat->Tipo			= 'A';
		$cat->save();
		
		return $cat;
	}

	





}