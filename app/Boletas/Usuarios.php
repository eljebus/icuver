<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;


class Usuarios extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'usuario';
	protected 	$primaryKey 	= 'idUsuario';
	public 		$timestamps 	= false;

	public function whoIs(){

		return $this->Tipo;
	}
	
	public function docentes(){

        return $this->hasMany('Boletas\Docente');
    }

    public function alumno(){

        return $this->hasMany('Boletas\Alumno');
    }


}
