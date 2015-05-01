<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Ciclo extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'ciclo';
	protected 	$primaryKey 	= 'idCiclo';
	public 		$timestamps 	= false;

	protected   $fillable 		= array('idCiclo', 'Nombre', 'Tipo','Inicio','Fin');




	public function boletas(){

        return $this->hasMany('Boletas\Boletas');
    }

    public function periodos(){

        return $this->hasMany('Boletas\Periodos','Ciclo', 'idCiclo');
    }
}
