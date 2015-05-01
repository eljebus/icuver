<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'HomeController@index');

Route::get('/Nosotros', 'HomeController@showWe');

Route::get('/Contacto', 'HomeController@showContact');

Route::get('/Asesorias', 'HomeController@showAseso');

Route::get('/Hotel', 'HomeController@showHotel');

Route::get('/Eventos', 'HomeController@showEvents');

Route::get('/Alumnos', 'HomeController@showLogin');

Route::get('/Galerias', 'HomeController@showGallery');

Route::get('/Galerias/{contenido}', 'HomeController@showContentGallery');

Route::post('/sendMail', 'MailController@sendMail');

Route::post('/Admin/remove', 'CmsController@deletePhoto');

Route::post('/Admin/addPhotos', 'CmsController@addPhotos');

Route::get('/Admin/{section}', 'CmsController@showAdmin');

Route::get('/Admin/new/{section}', 'CmsController@showNew');




//Boletas ---------------------------------------------------------------


Route::post('/Boleta', 'NotesController@routerUser');

Route::get('/Boletas/Alumnos', 'NotesController@showStudent');


// ------------------------------------------------------------------------------------ Admin


Route::get('/Boletas/Admin/Alumnos', 'NotesController@showListStudents');

Route::get('/Boletas/Admin/NuevoAlumno', 'NotesController@newStudent');

Route::get('/Boletas/Admin/Alumno/{item}', 'NotesController@viewStudent');

Route::post('/Boletas/saveStudent', 'NotesController@saveStudent');

Route::post('/Boletas/modifyStudent', 'NotesController@modifyStudent');


//


Route::get('/Boletas/Admin/Periodo/{item}', 'NotesController@viewPeriod');

Route::get('/Boletas/Admin/Periodos', 'NotesController@showListPeriods');

Route::get('/Boletas/Admin/NuevoPeriodo', 'NotesController@newPeriod');

Route::post('/Boletas/Admin/Save/Periodo', 'NotesController@savePeriod');

Route::post('/Boletas/Admin/modifyPeriodo', 'NotesController@modifyPeriod');


//


Route::get('/Boletas/Admin/Boletas/{item}', 'NotesController@showTicket');

Route::get('/Boletas/Admin/newTicket/{item}', 'NotesController@newTicket');

Route::get('/Boletas/Admin/verTicket/{item}', 'NotesController@viewTicket');



Route::post('/Boletas/Admin/saveTicket', 'NotesController@saveTicket');

Route::post('/Boletas/Admin/modifyTicket', 'NotesController@modifyTicket');

Route::get('/Boletas/Admin/exit', 'NotesController@exitAdmin');



//

Route::post('/Boletas/deleteItem', 'NotesController@deleteItem');


//-------------------------------------------------------------------------------------fin admin





/*Boletas ------------------------------------------------------------

Route::post('/Boletas', 'TicketController@routerUser');

Route::get('/Boletas/Alumnos', 'TicketController@showStudents');

Route::get('/Boletas/Alumnos/Reticula', 'TicketController@showCrossLinks');


//Admin boletas -------------------------------------------------------

/*Route::post('/Boletas/getMaterias','TicketController@getMaterias');

Route::post('/Boletas/saveCarrer','TicketController@saveCarrer');


Route::get('/Boletas/Admin/Nuevo/Profesores', 'TicketController@newTeacher');

Route::post('/Boletas/saveTeacher','TicketController@saveTeacher');



Route::get('/Boletas/Admin', 'TicketController@showAdmin');


Route::get('/Boletas/Admin/Nuevo/Reticula', 'TicketController@newCarrer');


Route::get('/Boletas/Admin/Nuevo/Listas', 'TicketController@newList');

Route::get('/Boletas/Admin/Nuevo/{item}', 'TicketController@newItem');

Route::post('/Boletas/Admin/Save/{item}','TicketController@saveItem');

Route::get('/Boletas/Admin/Academias/{item}', 'TicketController@showAcademic');


Route::get('/Boletas/Admin/Grupos/{item}', 'TicketController@showListas');

Route::get('/Boletas/Admin/{item}', 'TicketController@showList');

Route::get('/{contenido}', 'HomeController@showContent');*/










Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
