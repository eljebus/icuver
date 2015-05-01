<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Categoria extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'categoria';
	protected 	$primaryKey 	= 'Nombre';
	public 		$timestamps 	= false;

	public function materias(){

        return $this->hasMany('Boletas\Materias','Categoria');
    }
}
