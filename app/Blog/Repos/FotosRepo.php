<?php namespace Blog\Repos;

use Blog\Fotos;

class FotosRepo extends BaseRepo{

	public function getModel()
    {
        return new Fotos;
    }  


	public function getAll(){

		return Fotos::where('Status','=','1');
	}

	

	public function newPhoto($data){


		$foto 			= new Fotos();

		$foto->Nombre 	= $data['nombre'];
		$foto->Archivo  = $data['archivo'];
		$foto->Status 	= 1;
		$foto->Galeria  = $data['galeria'];

		$foto->save();

		return $foto; 


	}

	public function remove($id){

		$foto 			= 	Fotos::find($id);

		$foto->Status 	= '0';
		$foto->save();

		return true;
	}


	
	



}