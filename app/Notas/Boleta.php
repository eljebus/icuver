<?php namespace Notas;

use Illuminate\Database\Eloquent\Model;


class Boleta extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'boleta';
	protected 	$primaryKey 	= 'idBoleta';
	public 		$timestamps 	= false;

	public function periodo(){

        return $this->belongsTo('Notas\Periodos', 'Periodo', 'idPeriodo');
    }

    public function alumno(){

        return $this->belongsTo('Notas\Alumnos', 'Alumno', 'idAlumno');
    }


}
