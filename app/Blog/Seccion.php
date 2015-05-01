<?php namespace Blog;


use Illuminate\Database\Eloquent\Model;

class Seccion extends Model{


	protected 	$table 			= 'seccion';
	protected 	$primaryKey 	= 'idSeccion';
	public 		$timestamps 	= false;

	public function galeria(){

		return $this->belongsToMany('Blog\Galeria','seccion_galeria','Seccion','Galeria');
	}


	//Funcion hecha para metodos magicos de php con eloquent
	public function getIdAttribute(){


		return $this->idSeccion;
	}




}
