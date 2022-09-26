<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Country;
use App\Entity\Department;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('populationNumber')

            ->add('country', CollectionType::class, [
                'country_type' => CountryType::class,
           ])
             ->add('country', EntityType::class,[
                'required'=>false,
                'class'=>Country::class,
                'choice_label' => 'name',
                'label' => 'Pays',
                'mapped' => false,
                'placeholder' => 'Choisissez le pays',
            ])
            ->add('department', EntityType::class,[
                'label' => 'Départements / Province',
                'class'=>Department::class,
                'choice_label' => 'name',
                'placeholder' => 'Choisissez le département',
                'label_attr' => array('class' => 'd-none department_label'), # grâce à BS
                'attr' => array('class'=>'d-none')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => City::class,
        ]);
    }
}
