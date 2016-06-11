<?php
/**
 * Created by PhpStorm.
 * User: termi
 * Date: 04/06/2016
 * Time: 11:32
 */


namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ProfesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Ajout des champs "classiques"$builder->add('resume', 'text', array('label' => 'Résumé'));
        $builder
            ->add('note', 'text', array('label' => 'NOTE: '))
            ->add('dateNote', 'date', array('label' => 'DATE'))
        ->add('coef', 'text', array('label' => 'COEFFICIENT'));

        // Ajout des champs liés à une table

        $builder->add('idModule', 'entity', array(
            'class' => 'AppBundle:Module',
            'required' =>true,
            'label' => "MODULE: ",
            'property' => 'typemodule',
        ));

        $builder->add('idEleve', 'entity', array(
            'class' => 'AppBundle:Eleve',
            'required' =>true,
            'label' => "ELEVE: ",
            'property' => 'nom',
        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Note'
        ));
    }

    public function getName()
    {
        return 'note';
    }
}