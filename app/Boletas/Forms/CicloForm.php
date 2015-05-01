<?php namespace Boletas\Forms;

use Kris\LaravelFormBuilder\Form;

class CicloForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Nombre', 'text',
            	[
            	'attr' => ['name' 			=> 'Nombre', 
            			   'placeholder' 	=> 'Nombre del cilo'
            			  ],
            	])

            ->add('Inicio de ciclo','date',
            	[
            	'attr' => ['name' 			=> 'Inicio', 
            			   
            			  ],
            	])
            ->add('Fin de ciclo','date',
            	[
            	'attr' => ['name' 			=> 'Fin', 
            			  ],
            	])
            ->add('Registrar','submit');
    }
}