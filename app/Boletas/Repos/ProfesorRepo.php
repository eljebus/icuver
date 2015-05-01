<?php namespace Boletas\Repos;

use Boletas\Docente;
use Blog\Repos\BaseRepo;

class ProfesorRepo extends BaseRepo{

	public function getModel()
    {
        return new Docente;
    }  


	public function getAll(){

		return Docente::where('Status','=','A')->select('idDocente','Clave','Usuario');
	}

	public function newItem($datos){

		$cat 			=  new Docente();
		$cat->Clave 	= $datos['Clave'];
		$cat->Usuario 	= $datos['Usuario'];
		$cat->Status 	= 'A';
		$cat->save();
	}

	





}