<?php namespace Notas;

use Illuminate\Database\Eloquent\Model;


class Alumnos extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'alumno';
	protected 	$primaryKey 	= 'idAlumno';
	public 		$timestamps 	= false;

	public function whoIs(){

		return $this->Tipo;
	}
	
	

    

}
