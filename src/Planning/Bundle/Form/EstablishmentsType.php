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
            ->setMethod('POST')
            ->add('address',    'text')
            ->add('phone',      'text')
            ->add('email',      'email')
            ->add('subwayLine', 'text')
            ->add('accessPlan', 'text')
            ->add('save',      'submit')
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
