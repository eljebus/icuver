<?php namespace Notas\Repos;

use Notas\Alumnos;
use Blog\Repos\BaseRepo;

class AlumnoRepo extends BaseRepo{

	public function getModel()
    {
        return new Alumnos;
    }  


	public function getAll(){

		return Alumnos::where('Status','=','A')
						->where('Tipo','!=','Admin')
						->orderBy('idAlumno','desc');
	}

	public function auth($data){

		try{

			return Alumnos::where('user','=',$data['user'])
							->where('pass','=',$data['pass'])
							->first();
							//->where('pass','=',Hash::make($data['pass']))->first();
		}

		catch(\Exception $e){

			return false;
		}

	}



	public function getById($id){

		return Alumnos::where('idAlumno','=',$id)
						->where('Status','=','A')
						->first();
	}

	public function remove($id){

		$alumno = Alumnos::where('idAlumno','=',$id)
						->where('Status','=','A')
						->first();
		$alumno->Status = 'B';
		$alumno->save();
	}



	public function modifyUser($datos){

		$user 				= Alumnos::where('idAlumno','=',$datos['originalId'])
									->where('Status','=','A')
									->first();

		$user->idAlumno 	= $datos['Clave'];
		$user->Nombre		= $datos['Nombre'];
		$user->Apellidos	= $datos['Apellidos'];
		$user->Domicilio	= $datos['Domicilio'];
		$user->Estado		= $datos['Estado'];
		$user->Tel			= $datos['Tel'];
		$user->Nacimiento	= $datos['Nacimiento'];
		$user->Genero		= $datos['Genero'];
		$user->Mail 		= $datos['Mail'];
		$user->user			= $datos['Clave'];	
		$user->pass			= $datos['pass'];	
		$user->Status		= 'A';		
		$user->Tipo			= 'A';	

		$user->save();
		return $user;
	}



	public function newUser($datos){

		$user 				=  new Alumnos;
		$user->idAlumno 	= $datos['Clave'];
		$user->Nombre		= $datos['Nombre'];
		$user->Apellidos	= $datos['Apellidos'];
		$user->Domicilio	= $datos['Domicilio'];
		$user->Estado		= $datos['Estado'];
		$user->Tel			= $datos['Tel'];
		$user->Nacimiento	= $datos['Nacimiento'];
		$user->Genero		= $datos['Genero'];
		$user->Mail 		= $datos['Mail'];
		$user->user			= $datos['Clave'];	
		$user->pass			= $datos['pass'];	
		$user->Status		= 'A';		
		$user->Tipo			= 'A';	

		$user->save();
		return $user;
	}




}