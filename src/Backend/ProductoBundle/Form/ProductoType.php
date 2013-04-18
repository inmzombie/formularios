<?php

namespace Backend\ProductoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Backend\ProductoBundle\Form\CaracteristicaType;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('precio')
            ->add('descripcion')
            ->add('categoria')
            ->add('caracteristicas',
                    'collection', 
                        array(
                            'label'        => ' ', 
                            'type'         => new CaracteristicaType(),
                            'allow_add'    => true,
                            'allow_delete' => true,
                            'required'     => false,
                            'by_reference' => false,
                            )
                        )                
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\ProductoBundle\Entity\Producto'
        ));
    }

    public function getName()
    {
        return 'backend_productobundle_productotype';
    }
}
