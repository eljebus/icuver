<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Materias extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'materia';
	protected 	$primaryKey 	= 'idMateria';
	public 		$timestamps 	= false;

	public function reticula(){

		return $this->belongsToMany('Boletas\Reticula','reticula_materia', 'Materia', 'Reticula');
	}

}
