<?php namespace Boletas\Repos;

use Boletas\Materias;
use Blog\Repos\BaseRepo;

class MateriasRepo extends BaseRepo{

	public function getModel()
    {
        return new Materias;
    }  


	public function getAll(){

		return Materias::where('Status','=','A')
						->select('idMateria','Nombre','Nivel','Status')
						->orderBy('idMateria','Asc');
	}


	public function findByName($name,$stage){

		return Materias::where('Status','=','A')
						->where('Nombre','=',$name)
						->where('Nivel','=',$stage)
						->select('idMateria','Nombre','Nivel','Status')
						->first();
	}

	public function newItem($datos){

		$cat 			=  new Materias();
		$cat->Nombre 	= $datos['Nombre'];
		$cat->Nivel 	= $datos['Nivel'];
		$cat->Categoria = \Session::get('Categoria');
		$cat->Status 	= 'A';
		$cat->save();
	}

	





}