<?php namespace Boletas;

use Illuminate\Database\Eloquent\Model;



class Docente extends Model{

	protected 	$connection 	= 'boletas';

	protected 	$table 			= 'docente';
	protected 	$primaryKey 	= 'idDocente';
	public 		$timestamps 	= false;

	
    public function asignaciones(){

        return $this->hasMany('Boletas\Asignacion','Docente');
    }

    public function usuarios(){

        return $this->belongsTo('Boletas\Usuarios','Usuario');
    }

  


}
