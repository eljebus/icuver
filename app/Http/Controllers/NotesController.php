<?php namespace App\Http\Controllers;


use Request;

use Notas\Repos\AlumnoRepo;
use Notas\Repos\PeriodoRepo;
use Notas\Repos\BoletaRepo;
use Kris\LaravelFormBuilder\FormBuilder;
use Notas\Forms\PeriodoForm;


class NotesController extends Controller {


	protected $form;
	protected $user;
	protected $period;
	protected $ticket;

	public function __construct(FormBuilder $formBuilder,
								AlumnoRepo $user,
								PeriodoRepo $periodo,
								BoletaRepo $boleta){

			$this->form 	= $formBuilder;
			$this->user 	= $user;
			$this->period  	= $periodo;
			$this->ticket 	= $boleta;

			$this->middleware('user_Login');
			
	}


	public function routerUser(){

		if(\Session::has('Admin'))
			$type =  'Admin';

		if(\Session::has('Alumno'))
			$type =  'A';

		
		switch ($type) {
		  	case 'A':
		  		return  \Redirect::to('Boletas/Alumnos');
		  		break;
		  	
		  	case 'Admin':
		  		return  \Redirect::to('Boletas/Admin/Alumnos');
		  		break;
		  	default:
		  		# code...
		  		break;
		  }  

	}

	public function showStudent()
	{
	
		$alumno  = $this->user->getById(\Session::get('Alumno'));

		

		$boletas = $this->ticket
						->getAllByStudent($alumno->idAlumno)
						->paginate(20);



		$datos =  array(

			'boletas' => $boletas,
			'section' => 'Alumnos',
			'titulo'  => 'Administración',
			'alumno'  => $alumno
		);

		return view('/Boletas/alumnos/boletas')->with('data',$datos);
	}






	public function showListStudents()
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$idUser = \Session::get('Admin');

		$student = $this->user->getAll()->paginate(20);


		$datos =  array(

			'students'=> $student,
			'section' => 'Alumnos',
			'titulo'  => 'Administración'
		);

		return view('/Boletas/admin/index')->with('data',$datos);
	}


	public function showListPeriods()
	{

		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}	

		$periodo = $this->period->getAll()->paginate(20);


		$datos =  array(

			'periodo'=> $periodo,
			'section' => 'Periodos',
			'titulo'  => 'Administración'
		);

		return view('/Boletas/admin/periodos')->with('data',$datos);
	}



	public function newStudent()
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$datos =  array(

			'section' => 'Alumnos',
			'titulo'  => 'Administración'
		);

		return view('/Boletas/admin/alumno')->with('data',$datos);
	}



	public function newPeriod()
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$form = $this->form->create('\Notas\Forms\PeriodoForm', [
            'method' 	=> 'POST',
            'url' 		=> '/Boletas/Admin/Save/Periodo',
        ]);

		$datos =  array(

			'section' => 'Periodos',
			'titulo'  => 'Administración',
			'form'	  => $form
		);

		return view('/Boletas/admin/new')->with('data',$datos);
	}


	public function savePeriod()
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		try{

			$form 		= Request::all();

			$periodo 	=  $this->period->newPeriod($form);

		}
		catch(\Exception $e){

			$datos =  array(

				'section' => 'Periodos',
				'titulo'  => 'Administración',
				'error'	  => 'los datos son incorrectos o el periodo ya existe'	
			);

			return view('/Boletas/admin/new')->with('data',$datos);

		}
		
		//dd($student);

		return redirect('/Boletas/Admin/Periodos');
	}


	public function saveStudent()
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		try{

			$form = Request::all();

			$student =  $this->user->newUser($form);

		}
		catch(\Exception $e){

			$datos =  array(

				'section' => 'Alumnos',
				'titulo'  => 'Administración',
				'error'	  => 'los datos son incorrectos o el alumno ya existe'	
			);

			return view('/Boletas/admin/alumno')->with('data',$datos);

		}
		
		//dd($student);

		return redirect('/Boletas/Admin/Alumnos');
	}


	public function viewStudent($student)
	{

		$student = $this->user->getById($student);

		$datos =  array(
			'student' => $student,
			'section' => 'Alumnos',
			'titulo'  => 'Administración'
		);

		return view('/Boletas/admin/alumno')->with('data',$datos);
		
	}

	public function viewPeriod($periodo)
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$period = $this->period->getById($periodo);


		//dd($period->Nombre);
		$form =  \FormBuilder::plain([
            'method' => 'POST',
            'url' => '/Boletas/Admin/modifyPeriodo'
        ]) ->add('Nombre', 'text',[
            	'attr' 				=> ['name' 			=> 'Nombre', 
            			   				'placeholder' 	=> 'Nombre'],
            	 'default_value' 	=> $period->Nombre
            	])
            ->add('Inicio de Período', 'date',[
            	'attr' 				=> ['name' 			=> 'Inicio', 
            			   				'placeholder' 	=> 'Nombre'],
            	 'default_value' 	=> $period->Inicio
            	])
            ->add('Fin de período', 'date',[
            	'attr' 				=> ['name' 			=> 'Fin', 
            							'placeholder' 	=> 'Fin'],
            	 'default_value' 	=> $period->Fin
            	])
             ->add('test', 'hidden',[
            	'attr' 				=> ['name' 			=> 'originalId'],
            	 'default_value' 	=> $period->idPeriodo
            	])
            ->add('Registrar','submit');



		$datos =  array(

			'section' => 'Periodos',
			'titulo'  => 'Administración',
			'form'	  => $form
		);

		return view('/Boletas/admin/new')->with('data',$datos);
		
	}

	public function modifyPeriod()
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		try{

			$form = Request::all();

			$this->period->modifyPeriod($form);


		}
		catch(\Exception $e){

	
			return redirect('/Boletas/Admin/Periodo/'.$form['originalId']);

		}
		
		//dd($student);

		return redirect('/Boletas/Admin/Periodos');
	}


	public function modifyStudent()
	{
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		try{

			$form = Request::all();

			$this->user->modifyUser($form);


		}
		catch(\Exception $e){

	
			return redirect('/Boletas/Admin/Alumno/'.$form['originalId']);

		}
		
		//dd($student);

		return redirect('/Boletas/Admin/Alumnos');
	}

	public function deleteItem()
	{

		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		if (Request::ajax()){

			$retorno['Error']	=	'true';

			$id = Request::get('id');

			if(Request::get('seccion') === 'Alumnos')
				$this->user->remove($id);

			if(Request::get('seccion') === 'Periodos')
				$this->period->remove($id);

			$retorno['Error']	=	'false';

			return response()->json($retorno);

		}
		
	}
	
	public function showTicket($student){

		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$alumno  = $this->user->getById($student);

		$boletas = $this->ticket
						->getAllByStudent($student)
						->paginate(20);


		$datos =  array(

			'boletas' => $boletas,
			'section' => 'Alumnos',
			'titulo'  => 'Administración',
			'alumno'  => $alumno
		);

		return view('/Boletas/admin/boletas')->with('data',$datos);

	}


	public function newTicket($student){

		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$boletas = $this->ticket
						->getAllByStudent($student)
						->select('Periodo')
						->get();

	

		$periodList = array();

		foreach ($boletas as $boleta) {

			array_push($periodList,$boleta->Periodo);
		
		}


		$lista = $this->period->getExcludeArray($periodList);




		//dd($period->Nombre);
		$form =  \FormBuilder::plain([
							            'method' => 'POST',
							            'url' => '/Boletas/Admin/saveTicket'
							        ])->add('Archivo ', 'file',[
							            	'attr' 				=> ['name' 			=> 'Archivo', 
							            			   				'placeholder' 	=> 'Archivo de la boleta',
							            			   				'required'		=> 'required',
							            			   				'accept'		=> 'application/pdf']

							            	])
							        ->add('Período ', 'select',[
							            	'attr' 	  => ['name' 			=> 'Periodo',
							            				  'required'		=> 'required'],
							            	'choices' => $lista,

							            	])
						            ->add('test', 'hidden',[
						            	'attr' 				=> ['name' 			=> 'Alumno'],
						            	 'default_value' 	=> $student
						            	])
						            ->add('Registrar','submit');



		$datos =  array(

			'section' => 'Alumnos',
			'titulo'  => 'Administración',
			'form'	  => $form,
		);


		return view('/Boletas/admin/new')->with('data',$datos);

	}


	public function viewTicket($ticket){

		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$form =  \FormBuilder::plain([
							            'method' => 'POST',
							            'url' => '/Boletas/Admin/modifyTicket'
							        ])->add('Archivo ', 'file',[
							            	'attr' 				=> ['name' 			=> 'Archivo', 
							            			   				'placeholder' 	=> 'Archivo de la boleta',
							            			   				'required'		=> 'required',
							            			   				'accept'		=> 'application/pdf']

							            	])
							      
						            ->add('test', 'hidden',[
						            	'attr' 				=> ['name' 			=> 'idBoleta'],
						            	 'default_value' 	=> $ticket
						            	])
						            ->add('Actualizar','submit');



		$datos =  array(

			'section' => 'Alumnos',
			'titulo'  => 'Administración',
			'form'	  => $form,
		);


		return view('/Boletas/admin/new')->with('data',$datos);

	}

	public function modifyTicket(){

		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$ticket 	= $this->ticket->getById(Request::get('idBoleta'));

		$name 		= 'Boletas/'.$ticket->idBoleta.'-'.$_FILES['Archivo']['name'];



     	unlink(substr($ticket->Archivo,1));

		move_uploaded_file($_FILES['Archivo']['tmp_name'],$name );

		$ticket->Archivo =  '/'.$name;
		$ticket->save();


		return redirect('/Boletas/Admin/Boletas/'.$ticket->Alumno);

	}

	public function saveTicket()
	{
		
		if(!\Session::has('Admin')){
			return redirect('/Boletas/Alumnos');
			
		}

		$form 		= Request::all();

		$ticket 	= $this->ticket->newTicket($form);

		$name 		= 'Boletas/'.$ticket->idBoleta.'-'.$_FILES['Archivo']['name'];

     	if (isset($_FILES['Archivo'])){

			move_uploaded_file($_FILES['Archivo']['tmp_name'],$name );
		}

	     $ticket->Archivo ='/'.$name;
	     $ticket->save();

		
		
		
		//dd($student);

		return redirect('/Boletas/Admin/Boletas/'.Request::get('Alumno'));
	}

	public function exitAdmin(){

		\Session::forget('Alumno');
		\Session::forget('Admin');

		return redirect('/');
	}



	
}











