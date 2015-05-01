<?php namespace App\Http\Controllers;

use Blog\Repos\GaleriaRepo;
use Blog\Repos\SeccionRepo;


class HomeController extends Controller {


	protected $contenido;
	protected $galeria;

	public function __construct(SeccionRepo $section,GaleriaRepo $gallery){


			$this->seccion  	= $section;
			$this->galeria 		= $gallery;
		
	}


	public function index()
	{



		$seccion =  $this->seccion->getByname('Inicio');

		$galeria = $seccion->galeria()->first();

		$slider = $galeria->fotos()->where('Status','=','1')->get();

		return view('index')->with('slider',$slider);
	}

	public function showWe()
	{

		$datos =  array(

			'section' => 'Nosotros'
		);
		return view('nosotros')->with('data',$datos);
	}

	public function showContent($template)
	{

		$datos =  array(

			'section' => $template,
			'titulo'  => 'Contenido Académico'
		);
		return view($template)->with('data',$datos);
	}

	public function showContentGallery($template)
	{


		$seccion =  $this->seccion->getByname($template);
		
		
		$fotos = array();

		if(count($seccion)){

			if($seccion->galeria()->count() >0){

				$galeria = $seccion->galeria()->first();

				$fotos = $galeria->fotos()->where('Status','=','1')->get();

			}
		}
		
		
		$datos =  array(

			'section' => $template,
			'titulo'  => 'Galerías',
			'fotos'	  => $fotos
		);

		return view($template)->with('data',$datos);
	}


	public function showAseso()
	{

		$datos =  array(

			'section' => 'Asesorias',
			'titulo'  => 'Asesorías'
		);
		return view('Asesorias')->with('data',$datos);
	}

	public function showHotel()
	{

		$datos =  array(

			'section' => 'Hotel - Escuela',
			'titulo'  => 'Hotel - Escuela'
		);
		return view('Hotel')->with('data',$datos);
	}

	public function showGallery()
	{

		$datos =  array(

			'section' => 'Galerías',
			'titulo'  => 'Galerías'
		);
		return view('Galerias')->with('data',$datos);
	}


	public function showContact()
	{

		$datos =  array(

			'section' => 'Contacto',
			'titulo'  => 'Contacto'
		);
		return view('Contacto')->with('data',$datos);
	}

	public function showEvents()
	{

		$seccion =  $this->seccion->getByname('Eventos');

		$galeria = $seccion->galeria()->first();

		$events = $galeria->fotos()->get();


		$datos =  array(

			'section' => 'Eventos',
			'titulo'  => 'Eventos',
			'events'  => $events
		);
		return view('Eventos')->with('data',$datos);
	}

	public function showLogin()
	{

		$datos =  array(

			'section' => 'Alumnos',
			'titulo'  => 'Alumnos'
		);
		return view('Alumnos')->with('data',$datos);
	}
	
	
}
