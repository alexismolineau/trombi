<?php

namespace App\Form;

use App\Entity\Links;
use App\Entity\Student;
use App\Entity\Promotion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, ['required' => true])
            ->add('description', TextareaType::class, ['required' => true])
            ->add('groupPicture', FileType::class, [
                'required' => false,
                'data_class' => null,
            ])
            ->add('year', NumberType::class, ['required' => true])
            ->add('Student', EntityType:: class, [
                'class' => Student::class,
                'choice_label' => function($student) {
                    $prenom = $student->getPrenom();
                    $nom = $student->getNom();
                    return $prenom . ' ' . $nom;
                },
                'multiple' => true,
                'expanded' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
        ]);
    }
}
