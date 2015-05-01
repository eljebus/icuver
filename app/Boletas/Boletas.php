<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Boletas extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'boleta';
	protected 	$primaryKey 	= 'idBoleta';
	public 		$timestamps 	= false;

	

	public function alumno(){

        return $this->belongsTo('Alumno', 'Alumno', 'idAlumno');
    }

    public function ciclos(){

        return $this->belongsTo('Boletas\Ciclos', 'Ciclo', 'idCiclo');
    }

     public function calificaciones(){

        return $this->belongsTo('Boletas\Calificacion', 'Calificacion', 'idCalificacion');
    }


}
