<?php

namespace App\Form;

use App\Entity\Iva;
use App\Entity\Producto;
use App\Entity\Categoria;
use App\Entity\Empresa;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('descripcion')
            ->add('precio')            
            ->add('categoria',EntityType::class,array(
                'class' => Categoria::class,
                'choice_label' => function ($categoria) {
                    return $categoria->getNombre();
            }))
            ->add('empresa',EntityType::class,array(
                'class' => Empresa::class,
                'choice_label' => function ($empresa) {
                    return $empresa->getNombre();
            }))            
            ->add('iva',EntityType::class,array(
                'class' => Iva::class,
                'choice_label' => function ($iva) {
                    return $iva->getPorcentaje();
            }))

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
