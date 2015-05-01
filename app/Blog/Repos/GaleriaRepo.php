<?php namespace Blog\Repos;

use Blog\Galeria;

class GaleriaRepo extends BaseRepo{

	public function getModel()
    {
        return new Galeria;
    }  


	public function getAll(){

		return Galeria::where('Status','=','1');
	}


	public function getBySection($section){

		return Galeria::where('Status','=','1')->where('Seccion','=',$section);

	}


	
	



}