<?php

namespace Planning\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstablishmentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address')
            ->add('phone')
            ->add('email')
            ->add('subwayLine')
            ->add('name')
            ->add('save',   'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Planning\Bundle\Entity\Establishments'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'planning_bundle_establishments';
    }
}
