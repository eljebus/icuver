<?php namespace Blog\Repos;

use Blog\Contenido;

class ContenidoRepo extends BaseRepo{

	public function getModel()
    {
        return new Contenido;
    }  


	public function getAll(){

		return Contenido::where('Status','=','1');
	}


	
	



}