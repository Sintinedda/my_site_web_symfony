<?php

namespace App\Form\Skill;

use App\Entity\Skill\Skill;
use App\Entity\Skill\SubSkill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubSkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title1', TextType::class)
            ->add('descr_one', TextareaType::class)
            ->add('descr_one2', TextareaType::class, [
                'required' => false
            ])
            ->add('skill', EntityType::class, [
                'class' => Skill::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SubSkill::class,
        ]);
    }
}
