<?php namespace Notas;

use Illuminate\Database\Eloquent\Model;



class Periodos extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'periodo';
	protected 	$primaryKey 	= 'idPeriodo';
	public 		$timestamps 	= false;
	protected   $fillable 		= array('idPeriodo', 'Nombre', 'Inicio','Fin');
	
   
}
