<?php

namespace Planning\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HolidaysType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start',  'date',     array(
                'widget' => 'single_text',
            ))
            ->add('end',    'date',     array(
                'widget' => 'single_text',
            ))
            ->add('save',   'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Planning\Bundle\Entity\Holidays'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'planning_bundle_holidays';
    }
}
