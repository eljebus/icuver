<?php namespace Notas\Forms;

use Kris\LaravelFormBuilder\Form;

class PeriodoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Nombre', 'text',[
            	'attr' => ['name' 			=> 'Nombre', 
            			   'placeholder' 	=> 'Nombre'],
            	])
            ->add('Inicio de Período', 'date',[
            	'attr' => ['name' 			=> 'Inicio', 
            			   'placeholder' 	=> 'Nombre'],
            	])
            ->add('Fin de período', 'date',[
            	'attr' => ['name' 			=> 'Fin', 
            			   'placeholder' 	=> 'Fin'],
            	])
            ->add('Registrar','submit');
    }
}