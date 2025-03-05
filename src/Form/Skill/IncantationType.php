<?php

namespace App\Form\Skill;

use App\Entity\Classe\Classe;
use App\Entity\Skill\Incantation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IncantationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descr', TextareaType::class)
            ->add('title1', TextType::class)
            ->add('descr_one1', TextareaType::class)
            ->add('title2', TextType::class)
            ->add('descr_two1', TextareaType::class)
            ->add('descr_two2', TextareaType::class, [
                'required' => false
            ])
            ->add('descr_two3', TextareaType::class, [
                'required' => false
            ])
            ->add('title3', TextType::class, [
                'required' => false
            ])
            ->add('descr_three1', TextareaType::class, [
                'required' => false
            ])
            ->add('descr_three2', TextareaType::class, [
                'required' => false
            ])
            ->add('title4', TextType::class)
            ->add('descr_four1', TextareaType::class)
            ->add('capacity', ChoiceType::class, [
                'choices' => [
                    'INT' => 'Intelligence',
                    'SAG' => 'Sagesse',
                    'CHA' => 'Charisme'
                ]
            ])
            ->add('title5', TextType::class)
            ->add('descr_five1', TextareaType::class)
            ->add('title6', TextType::class, [
                'required' =>false
            ])
            ->add('descr_six1', TextareaType::class, [
                'required' =>false
            ])
            ->add('classe', EntityType::class, [
                'class' => Classe::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Incantation::class,
        ]);
    }
}
