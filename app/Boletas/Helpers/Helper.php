<?php namespace Boletas\Helpers;

	class Helper {

		protected $itemColumn;

		public function  __construct(){

			$this->itemColumn = array(

				'Grupos' 	=> array('Identificador','Nivel'),
				'Ciclo' 	=> array('No.','Estatus','Nombre','Inicio','Fin'),
				'Periodo'	=> array('Id','Nombre','Inicio','Fin'),
				'Academias' => array('Nombre'),
				'Materias'  => array('No','Nombre','Nivel','Estatus'),
				'Reticula'	=> array('No','Nombre','Tipo','Descripción'),
				'Profesores'=> array('No','Clave','Nombre'),
				'Generacion'=> array('No', 'Inicio','Fin'),
			);




		}


		public function getSection($section){


			switch ($section) {
				case 'Materias':
						return 'Academias';
					break;
				
				default:
					return $section;
					break;
			}
		}

		public function getColumns($model){


			return $this->itemColumn[$model];

		}


		public function getRepo($repo){

			switch ($repo) {
				case 'Academias':

					$repo = new \Boletas\Repos\CategoriaRepo();

					break;

				case 'Ciclo':
					$repo = new \Boletas\Repos\CicloRepo();
				break;

				case 'Reticula':
					$repo = new \Boletas\Repos\ReticulaRepo();
				break;

				case 'Profesores':
					$repo = new \Boletas\Repos\ProfesorRepo();
				break;

				case 'Grupos':
					$repo = new \Boletas\Repos\GrupoRepo();
				break;

				case 'Materias':
					$repo = new \Boletas\Repos\MateriasRepo();
				break;

				case 'Reticula':
					$repo = new \Boletas\Repos\ReticulaRepo();
				break;

				case 'Usuario':
					$repo = new \Boletas\Repos\UserRepo();
				break;
				

				case 'Listas':
					$repo = new \Boletas\Repos\ListasRepo();
				break;


				default:
					# code...
					break;
			}
			return $repo;
		}



	} 




