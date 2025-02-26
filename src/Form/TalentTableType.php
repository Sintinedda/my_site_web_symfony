<?php

namespace App\Form;

use App\Entity\Talent;
use App\Entity\TalentTable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TalentTableType extends AbstractType
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
            ->add('tr1_td1', TextType::class)
            ->add('tr1_td2', TextType::class)
            ->add('tr1_td3', TextType::class, [
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
            ->add('tr3_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr3_td3', TextType::class, [
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
            ->add('tr5_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr5_td3', TextType::class, [
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
            ->add('tr7_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr7_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr8_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr8_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr8_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr9_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr9_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr9_td3', TextType::class, [
                'required' => false
            ])
            ->add('tr10_td1', TextType::class, [
                'required' => false
            ])
            ->add('tr10_td2', TextType::class, [
                'required' => false
            ])
            ->add('tr10_td3', TextType::class, [
                'required' => false
            ])
            ->add('talent', EntityType::class, [
                'class' => Talent::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TalentTable::class,
        ]);
    }
}
