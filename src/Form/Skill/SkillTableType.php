<?php

namespace App\Form\Skill;

use App\Entity\Skill\Skill;
use App\Entity\Skill\SkillTable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillTableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false
            ])
            ->add('th1', TextType::class)
            ->add('th2', TextType::class)
            ->add('th3', TextType::class, [
                'required' => false
            ])
            ->add('th4', TextType::class, [
                'required' => false
            ])
            ->add('tr1_td1', TextType::class)
            ->add('tr1_td2', TextType::class)
            ->add('tr1_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr1_td4', TextType::class, [
                'required' => false
            ])
            ->add('tr2_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr2_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr2_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr2_td4', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td4', TextType::class, [
                'required' => false
            ])
            ->add('tr4_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr4_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr4_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr4_td4', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td4', TextType::class, [
                'required' => false
            ])
            ->add('start')
            ->add('skill', EntityType::class, [
                'class' => Skill::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SkillTable::class,
        ]);
    }
}
