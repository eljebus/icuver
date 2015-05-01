<?php namespace Boletas\Forms;

use Kris\LaravelFormBuilder\Form;

class GeneracionForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Inicio', 'date',['attr' => ['required'=>'']])
             ->add('Fin', 'date',['attr' => ['required'=>'']])
            ->add('Guardar','submit');
    }
}