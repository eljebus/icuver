<?php namespace Boletas\Repos;

use Boletas\Alumno;
use Blog\Repos\BaseRepo;

class StudentRepo extends BaseRepo{

	public function getModel()
    {
        return new Alumno;
    }  


	public function getAll(){

		return Alumno::where('Status','=','A');
	}


	public function getByUser($id){

		return Alumno::where('usuario','=',$id)
						->where('Status','=','A')
						->first();
	}


}