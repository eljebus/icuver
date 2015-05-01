<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Asignacion extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'asignacion';
	protected 	$primaryKey 	= 'idAsignacion';
	public 		$timestamps 	= false;


    public function docente(){

        return $this->belongsTo('Boletas\Docente', 'Docente', 'idDocente');
    }


}
