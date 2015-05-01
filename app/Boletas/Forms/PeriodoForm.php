<?php namespace Boletas\Forms;

use Kris\LaravelFormBuilder\Form;

class PeriodoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Nombre', 'text')
            ->add('Inicio de periodo','date')
            ->add('Fin de periodo','date')
            ->add('Registrar','submit');
    }
}