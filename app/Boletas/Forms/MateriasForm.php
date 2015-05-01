<?php namespace Boletas\Forms;

use Kris\LaravelFormBuilder\Form;

class MateriasForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Nombre', 'text',[
            	'attr' => ['name' 			=> 'Nombre', 
            			   'placeholder' 	=> 'Nombre de la Materia'],
            			   'required'		=>''
            	])
            ->add('Nivel','number',[
            	'attr' => ['name' 			=> 'Nivel', 
            			   'placeholder' 	=> '1'],
            			   'required'		=>''
            	])

            ->add('Registrar','submit');

    }
}