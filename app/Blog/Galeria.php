<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model{



	protected 	$table 			= 'galeria';
	protected 	$primaryKey 	= 'idGaleria';
	public 		$timestamps 	= false;

	public function seccion(){

        return $this->belongsToMany('Blog\Seccion','seccion_galeria','Seccion','Galeria');
    }

   	public function fotos(){

        return $this->hasMany('Blog\Fotos','Galeria','idGaleria');
    }
}
