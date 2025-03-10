<?php

namespace App\Form\Specialty;

use App\Entity\Specialty\SpecialtySkill;
use App\Entity\Specialty\SpecialtySkillTable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpecialtySkillTableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('th1', TextType::class)
            ->add('th2', TextType::class)
            ->add('tr1_td1', TextType::class)
            ->add('tr1_td2', TextareaType::class)
            ->add('tr2_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr2_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr3_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr4_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr4_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr5_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr6_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr6_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr7_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr8_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr8_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr9_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr9_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr10_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr10_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr11_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr11_td2', TextareaType::class, [
                'required' => false
            ])
            ->add('tr12_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr12_td2', TextareaType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpecialtySkillTable::class,
        ]);
    }
}
