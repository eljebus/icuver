<?php namespace Boletas\Repos;

use Boletas\Usuarios;
use Blog\Repos\BaseRepo;

class UserRepo extends BaseRepo{

	public function getModel()
    {
        return new Usuarios;
    }  


	public function getAll(){

		return Usuarios::where('Status','=','A');
	}

	public function auth($data){

		try{

			return Usuarios::where('user','=',$data['user'])->first();
							//->where('pass','=',Hash::make($data['pass']))->first();
		}

		catch(\Exception $e){

			return false;
		}

	}



	public function getById($id){

		return Usuarios::where('idUsuario','=',$id)
						->where('Status','=','A')
						->first();
	}

	public function newItem($datos){

		$user =  new Usuarios;

		$user->Nombre		= $datos['Nombre'];
		$user->Apellidos	= $datos['Apellidos'];
		$user->Domicilio	= $datos['Domicilio'];
		$user->Estado		= $datos['Estado'];
		$user->Tel			= $datos['Tel'];
		$user->Nacimiento	= $datos['Nacimiento'];
		$user->Genero		= $datos['Genero'];
		$user->user			= $datos['user'];	
		$user->pass			= $datos['pass'];	
		$user->Status		= 'A';		
		$user->Tipo			= 'D';	

		$user->save();
		return $user;
	}




}