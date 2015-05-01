<?php namespace Boletas\Repos;

use Boletas\Grupo;
use Blog\Repos\BaseRepo;

class GrupoRepo extends BaseRepo{

	public function getModel()
    {
        return new Grupo;
    }  


	public function getAll(){

		return Grupo::where('Status','=','A')->select('idGrupo','Nivel')->orderBy('IdGrupo','Asc');
	}


	

	public function newItem($datos){

		$cat 			=  new Grupo();
		$cat->idGrupo	= $datos['idGrupo'];
		$cat->Nivel 	= $datos['Nivel'];
		$cat->Status 	= 'A';
		$cat->save();
	}

	





}