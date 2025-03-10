<?php

namespace App\Form\Specialty;

use App\Entity\Specialty\DomainSpellTable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DomainSpellTableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('tr1_td2', TextType::class)
            ->add('tr2_td2', TextType::class)
            ->add('tr3_td2', TextType::class)
            ->add('tr4_td2', TextType::class)
            ->add('tr5_td2', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DomainSpellTable::class,
        ]);
    }
}
