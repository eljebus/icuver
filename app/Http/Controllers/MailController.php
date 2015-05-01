<?php namespace App\Http\Controllers;

use Request;
use Mail;


class MailController extends Controller {



	public function sendMail ()
	{

		if (Request::ajax()){


			$retorno = array(

				'Error' => true
			);

			$data = array(

				'name'		 => Request::get('name'),
				'mail'		 => Request::get('mail'),
				'message'	 => Request::get('message')
			);
			

			$dataMail = array(

				'asunto'	=> 'Comentario para ICUVER',
				'contenido' => $data['message']
			);

			Mail::send('emails/Mail', $dataMail, function($message) use ($data){

			    $message->to('contacto@icuver.edu.mx', $data['name'])->subject('Comentario ICUVER');

			    $message->from($data['mail'], $data['name']);

			});


			$retorno['Error'] =  false;

			return response()->json($retorno);

		}
	}

}
