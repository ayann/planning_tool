<?php

namespace Planning\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlanningsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startTime', null, array('date_widget' => "single_text", 'time_widget' => "single_text"))
            ->add('endTime', null, array('date_widget' => "single_text", 'time_widget' => "single_text"))
            ->add('classroom', null, array('empty_value' => 'Choisissez une salle'))
            ->add('promo', null, array('empty_value' => 'Choisissez une promo'))
            ->add('course', null, array('empty_value' => 'Choisissez un module'))
            // ->add('month')
            // ->add('content')
            // ->add('description')
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Planning\Bundle\Entity\Plannings'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'planning_bundle_plannings';
    }
}
