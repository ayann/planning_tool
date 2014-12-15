<?php

namespace Planning\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class PromoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
                'required' => true,
            ))
            ->add('comment', 'text', array(
                'required' => false,
            ))
            ->add('user', 'entity', array(
                'required' => false,
                'class' => 'User\Bundle\Entity\User',
                'query_builder' => function(EntityRepository $er) 
                                    {
                                        return $er->createQueryBuilder('c')
                                        ->where('c.isValid = 1');
                                    },
                'property' => 'title',
            ));
    }

    public function getName()
    {
        return 'planning_promotype';
    }
}
