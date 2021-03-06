<?php

namespace App\Form;

use App\Entity\Pedido;
use App\Entity\LineaPedido;
use App\Form\PedidoType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

class PedidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
        ->add('numpedido')
        ->add('fecha', DateType::class, array(
             'label' => 'Fecha',
             'widget' => 'single_text',
             'html5' => true,
             'required' => true
          ))
        /*->add('lineasPedido',EntityType::class,array(
                'class' => LineaPedido::class,
                'choice_label' => function ($lineaPedido) {
                    return $lineaPedido->getCantidad(); 
            }))  */ 
        ->add('total')    
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pedido::class,
        ]);
    }
}
