<?php namespace Boletas\Repos;

use Boletas\Categoria;
use Blog\Repos\BaseRepo;

class CategoriaRepo extends BaseRepo{

	public function getModel()
    {
        return new Categoria;
    }  


	public function getAll(){

		return Categoria::where('Status','=','A')->select('Nombre')->orderBy('Nombre','Asc');
	}

	

	public function newItem($datos){

		$cat 			=  new Categoria();
		$cat->Nombre 	= $datos['Nombre'];
		$cat->Status 	= 'A';
		$cat->save();
	}

	





}