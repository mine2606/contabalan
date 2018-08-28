<?php

namespace App\Form;

use App\Entity\Venta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         ->add('numero')
        ->add('numfactura')
        ->add('fecha')
        ->add('nombrecliente')
        ->add('referencia')
        ->add('telefono')
        ->add('total')
        ->add('estado')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Venta::class,
        ]);
    }
}
