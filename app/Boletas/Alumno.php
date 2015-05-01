<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Alumno extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'alumno';
	protected 	$primaryKey 	= 'idAlumno';
	public 		$timestamps 	= false;

	public function grupo(){

        return $this->belongsToMany('Boletas\Grupo','alumno_grupo','Alumno','Grupo');
    }

    public function boletas(){

        return $this->hasMany('Boletas\Boletas','Alumno');
    }

    public function usuario(){

        return $this->belongsTo('Boletas\Usuarios', 'Usuario', 'idUsuario');
    }



}
