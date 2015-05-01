<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Calificacion extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'calificacion';
	protected 	$primaryKey 	= 'idCalificacion';
	public 		$timestamps 	= false;


    public function asignacion(){

        return $this->belongsTo('Boletas\Asignacion', 'Asignacion', 'idAsignacion');
    }

    public function periodo(){

        return $this->belongsTo('Boletas\Periodo', 'Periodo', 'idPeriodo');
    }


    public function boleta(){

        return $this->belongsTo('Boletas\Boleta', 'Boleta', 'idBoleta');
    }


}
