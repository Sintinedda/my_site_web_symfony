<?php

namespace App\Form\Specialty;

use App\Entity\Specialty\SpecialtyItemTable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpecialtyItemTableType extends AbstractType
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpecialtyItemTable::class,
        ]);
    }
}
