<?php namespace Boletas\Repos;

use Boletas\Listas;
use Blog\Repos\BaseRepo;
use Boletas\Repos\CicloRepo;

class ListasRepo extends BaseRepo{

	public function getModel()
    {
        return new Listas;
    }  


	public function getAll(){

		return Listas::where('Status','=','A')->select('IdGrupo','Nivel')->orderBy('IdGrupo','Asc');
	}

	

	public function findByGroup($data){

		return Listas::where(
							
							function ( $query )
						    {
						        $query->where( 'Status', '=', 'A' )
						            ->orWhere( 'Status', '=', 'B' );
						    }
						)
					->where('Grupo','=',$data[0])
					->where('Nivel','=',$data[1])
					->select('idLista','Status')
					->orderBy('Status')
					->get();
	}


	public function newItem(){


		$ciclo 			= new CicloRepo();

		$ciclo 			= $ciclo->getNew()->first();

		$grupo 			= \Session::get('Grupo');

		$grupo 			= explode('-', $grupo);


		$list 			= Listas::where('Status','=','A')
						->where('Grupo','=',$grupo[0])
						->where('Nivel','=',$grupo[1])
						->update(['Status' => 'B']);



		$cat 			=  new Listas();
		$cat->Tipo 		= 'A';

		


		$cat->Ciclo 	= $ciclo->idCiclo;
		$cat->Grupo 	= $grupo[0];
		$cat->Nivel 	= $grupo[1];
		$cat->Status 	= 'A';
		$cat->save();


	}

	





}