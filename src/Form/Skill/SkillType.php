<?php

namespace App\Form\Skill;

use App\Entity\Classe\ClasseByLevel;
use App\Entity\Skill\Skill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('part', TextType::class, [
                'required' => false
            ])
            ->add('level', IntegerType::class, [
                'required' => false
            ])
            ->add('optional')
            ->add('show_descr')
            ->add('descr1', TextareaType::class, [
                'required' => false
            ])
            ->add('descr2', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr3', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr4', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr5', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr6', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr7', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr8', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr9', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr10', TextAreaType::class, [
                'required' => false
            ])
            ->add('lvl', ChoiceType::class, [
                'label' => 'niveau',
                'multiple' => true,
                'mapped' => false,
                'choices' => [
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4, 
                    5 => 5, 
                    6 => 6, 
                    7 => 7, 
                    8 => 8, 
                    9 => 9, 
                    10 => 10, 
                    11 => 11, 
                    12 => 12, 
                    13 => 13, 
                    14 => 14, 
                    15 => 15, 
                    16 => 16, 
                    17 => 17, 
                    18 => 18, 
                    19 => 19, 
                    20 => 20,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Skill::class,
        ]);
    }
}
