<?php

namespace App\Form\Spell;

use App\Entity\Spell\SpellTable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpellTableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false
            ])
            ->add('show_name')
            ->add('number', IntegerType::class)
            ->add('place', IntegerType::class)
            ->add('th1', TextType::class)
            ->add('th2', TextType::class)
            ->add('th3', TextType::class, [
                'required' => false
            ])
            ->add('th4', TextType::class, [
                'required' => false
            ])
            ->add('th5', TextType::class, [
                'required' => false
            ])
            ->add('th6', TextType::class, [
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
            ->add('tr1_td5', TextType::class, [
                'required' => false
            ])
            ->add('tr1_td6', TextType::class, [
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
            ->add('tr2_td5', TextType::class, [
                'required' => false
            ])
            ->add('tr2_td6', TextType::class, [
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
            ->add('tr3_td5', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td6', TextType::class, [
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
            ->add('tr4_td5', TextType::class, [
                'required' => false
            ])
            ->add('tr4_td6', TextType::class, [
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
            ->add('tr5_td5', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td6', TextType::class, [
                'required' => false
            ])
            ->add('tr6_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr6_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr6_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr6_td4', TextType::class, [
                'required' => false
            ])
            ->add('tr6_td5', TextType::class, [
                'required' => false
            ])
            ->add('tr6_td6', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td4', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td5', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td6', TextType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpellTable::class,
        ]);
    }
}
