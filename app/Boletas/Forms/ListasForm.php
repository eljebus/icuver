<?php namespace Boletas\Forms;

use Kris\LaravelFormBuilder\Form;

class AcademiasForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Nombre', 'text',[
            	'attr' => ['name' 			=> 'Nombre', 
            			   'placeholder' 	=> 'Nombre de la Academia'],
            	])
            ->add('Registrar','submit');
    }
}