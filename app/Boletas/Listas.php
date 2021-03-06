<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Listas extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'lista';
	protected 	$primaryKey 	= 'idLista';
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
