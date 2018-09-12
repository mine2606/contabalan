<?php

namespace App\Form;

use App\Entity\Producto;
use App\Entity\Pedido;
use App\Entity\LineaPedido;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LineaPedidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('pedido',EntityType::class,array(
                'class' => Pedido::class,
                'choice_label' => 'numpedido'
            )) 
            ->add('producto',EntityType::class,array(
                'class' => Producto::class,
                'choice_label' => 'nombre'
            )) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LineaPedido::class,
        ]);
    }
}
