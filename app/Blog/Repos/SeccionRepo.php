<?php namespace Blog\Repos;

use Blog\Seccion;

class SeccionRepo extends BaseRepo{

	public function getModel()
    {
        return new Seccion;
    }  


	public function getAll(){

		return Seccion::where('Status','=','1');
	}

	public function getByName($name){

		return Seccion::where('Status','=','1')->where('Nombre','=',$name)->first();
	}






}