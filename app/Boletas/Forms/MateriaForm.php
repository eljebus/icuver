<?php namespace Boletas\Forms;

use Kris\LaravelFormBuilder\Form;

class MateriaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Nombre', 'text')
            ->add('Nivel','number',[
            	'attr' => ['name' 			=> 'Nivel', 
            			   'placeholder' 	=> 'Nivel'],
            	])
            ->add('Registrar','submit');
    }
}