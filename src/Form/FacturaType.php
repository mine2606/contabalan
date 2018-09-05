<?php

namespace App\Form;

use App\Form\ClienteType;
use App\Entity\Cliente;
use App\Entity\Factura;
use App\Entity\Proveedor;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

class FacturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        ->add('fecha', DateType::class, array(
             'label' => 'Fecha',
             'widget' => 'single_text',
             'html5' => true,
             'required' => true
          ))
        ->add('referencia')
        ->add('total')                
        ->add('cliente',EntityType::class,array(
                'class' => Cliente::class,
                'choice_label' => function ($cliente) {
                    return $cliente->getNombre();
            }))
         ->add('guardar', SubmitType::class, array())
        
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Factura::class,
        ]);
    }
}
