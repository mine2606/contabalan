<?php

namespace App\Form;

use App\Entity\Compra;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

class CompraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder        
        ->add('fechafactura')
        ->add('referencia')
        ->add('telefono')
        ->add('total')
        ->add('pendiente')
        ->add('estadopago')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compra::class,
        ]);
    }
}
