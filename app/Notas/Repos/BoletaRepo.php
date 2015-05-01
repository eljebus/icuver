<?php namespace Notas\Repos;

use Notas\Boleta;
use Blog\Repos\BaseRepo;

class BoletaRepo extends BaseRepo{

	public function getModel()
    {
        return new Boleta;
    }  


	public function getAll(){

		return Boleta::where('Status','=','A')
						->orderBy('idAlumno','desc');
	}

	public function getAllByStudent($student){

		return Boleta::where('Status','=','A')
						->where('Alumno','=',$student)
						->orderBy('idBoleta','desc');
	}



	public function getById($id){

		return Boleta::where('idBoleta','=',$id)
						->where('Status','=','A')
						->first();
	}

	public function remove($id){

		$alumno = Boleta::where('idAlumno','=',$id)
						->where('Status','=','A')
						->first();
		$alumno->Status = 'B';
		$alumno->save();
	}

	public function newTicket($datos){

		$boleta =  new Boleta();

		$boleta->Tipo 	= 'A';
		$boleta->Fecha 	= date('Y-m-d');
		$boleta->Status = 'A';
		$boleta->Archivo= 'pendiente';
		$boleta->Periodo= $datos['Periodo'];
		$boleta->Alumno = $datos['Alumno'];

		$boleta->save();

		return $boleta;

	}



	







}