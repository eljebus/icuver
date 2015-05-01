<?php namespace Blog;


use Illuminate\Database\Eloquent\Model;

class Fotos extends Model{




	protected 	$table 			= 'fotos';
	protected 	$primaryKey 	= 'idFotos';
	public 		$timestamps 	= false;

	public function fotos(){

        return $this->belongsTo('Blog\Galeria','Fotos','idFotos');
    }
}
