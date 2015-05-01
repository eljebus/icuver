<?php namespace App\Http\Controllers;


use Blog\Repos\ContenidoRepo;
use Blog\Repos\GaleriaRepo;
use Blog\Repos\SeccionRepo;
use Blog\Repos\FotosRepo;
use Request;
//use App\Services\Registrar;

class CmsController extends Controller {

	
	protected $seccion;
	protected $galeria;
	protected $usuario;
	protected $fotos;

	protected $registrar;

	public function __construct(SeccionRepo $content,GaleriaRepo $gallery,FotosRepo $photo){

			//$register->create(array('name' => 'jesus','email'=>'jesuscervantes82@hotmail.com','password'=>'6374'));
			$this->seccion  	= $content;
			$this->galeria 		= $gallery;
			$this->fotos 		= $photo;
			$this->middleware('auth');

	}


	public function showAdmin($section)
	{

		$seccion =  $this->seccion->getByname($section);
		
		
		$fotos = array();

		if(count($seccion)){

			if($seccion->galeria()->count() >0){

				$galeria = $seccion->galeria()->first();

				$fotos = $galeria->fotos()
								->where('Status','=','1')
								->get();

			}
		}


		$datos =  array(

			'section' => $section,
			'titulo'  => 'Administracion',
			'fotos'   => $fotos
		);
		return view('/Admin/index')->with('data',$datos);
	}

	public function showNew($section)
	{

		$datos =  array(

			'section' => $section,
			'titulo'  => 'Administracion'
		);
		return view('/Admin/new')->with('data',$datos);
	}

	public function deletePhoto(){


		if (Request::ajax()){

			$retorno['Error']	=	'true';

			$id = Request::get('id');

			$foto = $this->fotos->remove($id);

			$retorno['Error']	=	'false';

			return response()->json($retorno);

		}
	}

	public function addPhotos(){


		if (Request::ajax()){

			$seccion = Request::get('seccion');

			$seccion = $this->seccion
							->getByName($seccion);
			

			$galeria = $seccion->galeria()
							->first()
							->idGaleria;

			$retorno['Error']	=	'true';


			//Se guarda el resto de imagenes
				$contador = 0;

				$path=public_path().'/image/galeria/';

				foreach ($_FILES as $key) {

					$name = $seccion->Nombre.'-'.$contador.$key['name'];



					move_uploaded_file($key['tmp_name'], $path.$name);

					$foto['nombre'] 	= $name;
					$foto['archivo']	= '/image/galeria/'.$name;
					$foto['galeria']	= $galeria;

					$this->fotos->newPhoto($foto);

					$contador++;
	
				}



				$retorno['Error']	=	'false';

				return response()->json($retorno);

			}

	}





	
}
