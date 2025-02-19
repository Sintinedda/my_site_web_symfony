<?php

namespace App\Form;

use App\Entity\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('dv', IntegerType::class)
            ->add('Armor', TextType::class)
            ->add('weapon', TextType::class)
            ->add('tool', TextType::class)
            ->add('save', TextType::class)
            ->add('competence', TextType::class)
            ->add('equipment1', TextType::class)
            ->add('equipment2', TextType::class, [
                'required' => false
            ])
            ->add('equipment3', TextType::class, [
                'required' => false
            ])
            ->add('equipment4', TextType::class, [
                'required' => false
            ])
            ->add('equipment5', TextType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
