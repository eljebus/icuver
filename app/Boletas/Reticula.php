<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;


class Reticula extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'reticula';
	protected 	$primaryKey 	= 'idReticula';
	public 		$timestamps 	= false;

	public function grupos(){
		
        return $this->hasManyThrough('Reticula', 'Grupo','Reticula','idReticula');
    }

    public function materias(){

		return $this->belongsToMany('Boletas\Materias','reticula_materia', 'Reticula', 'Materia');
	}

}
