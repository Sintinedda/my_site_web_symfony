<?php

namespace App\Form\Specialty;

use App\Entity\Specialty\SpecialtySkillList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpecialtySkillListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number', IntegerType::class)
            ->add('place', IntegerType::class)
            ->add('l1', TextareaType::class)
            ->add('l2', TextareaType::class, [
                'required' => false
            ])
            ->add('l3', TextareaType::class, [
                'required' => false
            ])
            ->add('l4', TextareaType::class, [
                'required' => false
            ])
            ->add('l5', TextareaType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpecialtySkillList::class,
        ]);
    }
}
