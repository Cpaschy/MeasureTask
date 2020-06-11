<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestionTacheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('temps',TimeType::class,array(
            'widget' => 'choice',
            'placeholder' => [
            'hour' => null, 'minute' => 'Minute', 'second' => 'Second',
             ])
            )
            ->add('tacheAutre',TextareaType::class,array(
                'required' => false ,
            ))
            ->add('tacheAdmin',EntityType::class,array(
                'class' =>'AppBundle:TacheAdmin',
                'choice_label' => 'nom',
                'required' => false,
                'placeholder'=>'--Sélectionner votre tache Administratif')
            )
            ->add('tacheAlg',EntityType::class,array(
                'class' =>'AppBundle:TacheAlg',
                'choice_label' => 'nom',
                'required' => false,
                'placeholder'=>'--Sélectionner votre tache ALG'))
            ->add('tachePilote',EntityType::class,array(
                'class' =>'AppBundle:TachePilote',
                'choice_label' => 'nom',
                'required' => false,
                'placeholder'=>'--Sélectionner votre tache Pilote'))
            ->add('save', SubmitType::class, array(
            'label' => "Enregistrer",
            'attr' => array(
                'class' =>'btn btn-primary'
            ))
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GestionTache'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_gestiontache';
    }


}
