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
            ->add('start', null, array('date_widget' => "single_text", 'time_widget' => "single_text"))
            ->add('end', null, array('date_widget' => "single_text", 'time_widget' => "single_text"))
            ->add('classroom', null, array('empty_value' => 'Choisissez une salle'))
            ->add('promo', null, array('empty_value' => 'Choisissez une promo'))
            ->add('course', null, array('empty_value' => 'Choisissez un module'))
            ->add('teacher', null, array('empty_value' => 'Choisissez un professeur'))
            ->add('content')
            ->add('description')
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
