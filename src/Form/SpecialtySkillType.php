<?php

namespace App\Form;

use App\Entity\SpecialtyItem;
use App\Entity\SpecialtySkill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpecialtySkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('descr1', TextareaType::class)
            ->add('descr2', TextareaType::class, [
                'required' => false
            ])
            ->add('descr3', TextareaType::class, [
                'required' => false
            ])
            ->add('descr4', TextareaType::class, [
                'required' => false
            ])
            ->add('descr5', TextareaType::class, [
                'required' => false
            ])
            ->add('specialty', EntityType::class, [
                'class' => SpecialtyItem::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpecialtySkill::class,
        ]);
    }
}
