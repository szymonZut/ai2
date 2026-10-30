<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'attr' => [
                    'placeholder' => 'Enter Date',
                ]
            ])
            ->add('temperature', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Enter Temperature',
                    'min' => -80,
                    'max' => 80,
                    'step' => 'any',
                ]
            ])
            ->add('humidity', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Enter humidity (0-100%)',
                    'min' => 0,
                    'max' => 100,
                    'step' => 'any',
                ]
            ])
            ->add('wind', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Enter wind km/h',
                    'min' => 0,
                    'max' => 100,
                    'step' => 'any',
                ]
            ])
            ->add('rain_probability', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Enter rain probability (0-100%)',
                    'min' => 0,
                    'max' => 100,
                    'step' => 'any',
                ]
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => function (Location $location) {
                    return $location->getId() . ' - ' . $location->getCity();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
