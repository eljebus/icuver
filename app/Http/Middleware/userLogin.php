<?php namespace App\Http\Middleware;

use Notas\Repos\AlumnoRepo;
use Closure;

class userLogin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		

		if(!\Session::has('Alumno') && !\Session::has('Admin')){

			$user = new AlumnoRepo;
			$user = $user->auth($request->all());



			if(!$user)
				return redirect()->guest('/Alumnos');


			if($user->Tipo === 'A')
				\Session::put('Alumno', $user->idAlumno);

			elseif($user->Tipo === 'Admin')
				\Session::put('Admin', $user->idAlumno);


		}

		return $next($request);
	}

}
