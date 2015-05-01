<?php namespace Boletas\Forms;

use Kris\LaravelFormBuilder\Form;

class GruposForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Letra', 'text',[
            	'attr' => ['name' 			=> 'idGrupo', 
            			   'placeholder' 	=> 'A'],
            	])
            ->add('Nivel', 'number')
            ->add('Registrar','submit');
    }
}