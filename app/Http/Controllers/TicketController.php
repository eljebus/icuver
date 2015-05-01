<?php namespace App\Http\Controllers;


use Request;
use Boletas\Repos\UserRepo;
use Boletas\Repos\StudentRepo;
use Boletas\Repos\CategoriaRepo;
use Boletas\Repos\MateriasRepo;
use Boletas\Helpers\Helper;
use Kris\LaravelFormBuilder\FormBuilder;
use Boletas\Forms\GrupoForm;


class TicketController extends Controller {

	protected $user;
	protected $student;
	protected $helper;
	protected $form;
	protected $categorias;
	protected $materias;

	

	public function __construct(UserRepo $user, 
								StudentRepo $alumno,
								Helper $help,
								FormBuilder $formBuilder,
								CategoriaRepo $category,
								MateriasRepo $materia){

			$this->form 	= $formBuilder;
			$this->middleware('user_Login');
			$this->user 	= $user;
			$this->student 	= $alumno;
			$this->helper 	= $help;
			$this->categorias = $category;
			$this->materias = $materia;

	}


	public function routerUser(){


		$idUser = \Session::get('Usuario');

		$user 	= $this->user->getById($idUser);

		$type 	= $user->whoIs();

		switch ($type) {
		  	case 'A':
		  		return  \Redirect::to('Boletas/Alumnos');
		  		break;
		  	
		  	default:
		  		# code...
		  		break;
		  }  

	}

	public function showStudents()
	{

		$idUser = \Session::get('Usuario');

		$student = $this->student->getByUser($idUser);

		$datos =  array(

			'student' => $student,
			'section' => 'Portal Estudiante',
			'titulo'  => 'Portal Estudiante'
		);

		return view('/Boletas/alumnos/index')->with('data',$datos);
	}

	public function showCrossLinks()
	{

		$idUser = \Session::get('Usuario');

		$student = $this->student->getByUser($idUser);

		$datos =  array(

			'student' => $student,
			'section' => 'Portal Estudiante',
			'titulo'  => 'Portal Estudiante'
		);

		return view('/Boletas/alumnos/reticula')->with('data',$datos);
	}



	public function showAdmin(){


		
		$idUser 		= \Session::get('Usuario');

		$columnas 		= $this->helper->getColumns('Grupo');

		$datos =  array(

			'student' => '',
			'section' => 'Portal Estudiante',
			'titulo'  => 'Portal Estudiante',
			'columns' => $columnas,
			'newItem' => 'Nuevo Grupo'
		);


		return view('/Boletas/admin/index')->with('data',$datos);
	}

	public  function showList($item){

		$idUser 	= \Session::get('Usuario');

		$columnas 	= $this->helper->getColumns($item);



		$dataModel 	= $this->helper->getRepo($item)->getAll()->get();


		$datos =  array(

			'student' => '',
			'section' => $item,
			'titulo'  => 'Portal Estudiante',
			'columns' => $columnas,
			'model'	  => $dataModel,
		);




		return view('/Boletas/admin/index')->with('data',$datos);
	}


	public function newItem($item){


		$form = $this->form->create('\Boletas\Forms\\'.$item.'Form', [
            'method' 	=> 'POST',
            'url' 		=> '/Boletas/Admin/Save/'.$item,
        ]);


		$datos =  array(

			'student' => '',
			'item'    => $item,
			'section' => $item,
			'titulo'  => 'Portal Estudiante',
			'form' 	  => $form

		);


		return view('/Boletas/admin/new')->with('data',$datos);


	}

	public function newCarrer(){


		$academias = $this->categorias->getAll();
			
		$datos =  array(

			'student' 	=> '',
			'item'    	=> 'Carrera',
			'section' 	=> 'Reticula',
			'titulo'  	=> 'Portal Estudiante',
			'academias' => $academias

		);


		return view('/Boletas/admin/reticula')->with('data',$datos);


	}

	public function newTeacher(){


		$academias = $this->categorias->getAll();
			
		$datos =  array(

			'student' 	=> '',
			'item'    	=> 'Profesor',
			'section' 	=> 'Profesores',
			'titulo'  	=> 'Portal Estudiante',
			'academias' => $academias

		);


		return view('/Boletas/admin/maestro')->with('data',$datos);


	}


	//Guardado items

	public function saveItem($item){

		$form = Request::all();

		//dd($form);

		$repo = $this->helper
					->getRepo($item)
					->newItem($form);

		return redirect('/Boletas/Admin/'.$item);

	}


	public function newList(){



		$repo = $this->helper
					->getRepo('Listas')
					->newItem();

		return redirect('/Boletas/Admin/Grupos/'.\Session::get('Grupo'));

	}

	public function saveCarrer(){

		$form = Request::all();



		$repo = $this->helper
					->getRepo('Reticula')
					->newItem($form);

		$materias = explode(',',Request::get('Materias'));


		foreach($materias as $materia){

			$data 		= explode('-',$materia);

			$materia 	= $data[0];
			$nivel 		= $data[1];

			$item 		= $this->materias->findByName($materia,$nivel);

			$repo->materias()->attach($item->idMateria);
		}
			

		return redirect('/Boletas/Admin/Reticula');

	}

	public function saveTeacher(){

		$form = Request::all();

		$repo = $this->helper
					->getRepo('Usuario')
					->newItem($form);

		$teacher = new \Boletas\Repos\ProfesorRepo();
		$datos = array(
			'Clave' 	=> $form['Clave'],
			'Usuario'	=> $repo->idUsuario
		);

		$teacher->newItem($datos);


		return redirect('/Boletas/Admin/Profesores');

	}




	public function getMaterias(){

		if (Request::ajax()){

			$materias = $this->categorias->find(Request::get('categoria'))->materias()->selectRaw('CONCAT(Nombre, "-", Nivel) AS Nombre')->orderBy('Nombre')->get();
			$datos = array();
			$datos['materias'] =$materias;

			return \Response::json($datos);
		}

	}

	public function showListas($item){

		$columnas 	= array('No','Estatus');

		$dataModel 	= new \Boletas\Repos\ListasRepo();

		$data = explode('-', $item);

		$dataModel 	= $dataModel->findByGroup($data);

		$datos =  array(

			'student' 		=> '',
			'section' 		=> 'Listas',
			'sectionT'		=> 'Listas de '.$item,
			'sectionLink'	=> 'Listas',
			'titulo'  		=> 'Portal Estudiante',
			'columns' 		=> $columnas,
			'model'	  		=> $dataModel
		);

		\Session::put('Grupo', $item);

		return view('/Boletas/admin/index')->with('data',$datos);

	}

	public function showAcademic($item){


		$columnas 	= array('No','Nombre','Nivel','Estatus');

		$dataModel 	= new \Boletas\Repos\CategoriaRepo();

		$dataModel 	= $dataModel->find($item);

		\Session::put('Categoria', $dataModel->Nombre);


		$datos =  array(

			'student' 		=> '',
			'section' 		=> 'Academias',
			'sectionT'		=> 'Listas de '.$item,
			'sectionLink'	=> 'Grupos',
			'titulo'  		=> 'Portal Estudiante',
			'columns' 		=> $columnas,
			'model'	  		=> $dataModel->materias()->select('idMateria','Nombre','Nivel','Status')->get()
		);


		return view('/Boletas/admin/index')->with('data',$datos);

	}

	
}











