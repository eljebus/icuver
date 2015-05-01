<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;


class Grupo extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'grupos';
	protected 	$primaryKey 	= 'idGrupo';
	public 		$timestamps 	= false;



	public function listas(){

        return $this->hasMany('Boletas\Listas');
    }


}
