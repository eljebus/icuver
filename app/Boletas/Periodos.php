<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Periodos extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'periodo';
	protected 	$primaryKey 	= 'idPeriodo';
	public 		$timestamps 	= false;
	protected   $fillable 		= array('idGPeriodo', 'Nombre', 'Inicio','Fin');
	
    public function ciclos(){

        return $this->belongsTo('Boletas\Ciclos', 'Ciclo', 'idCiclo');
    }
}
