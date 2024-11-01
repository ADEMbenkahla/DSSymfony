<?php

namespace App\Form;

use App\Entity\TheatrePlay;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TheatrePlayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title')
            ->add('Genre')
            ->add('Duration')
            ->add('submit', SubmitType::class, [
                'label' => $options['submit_label'] ?? 'Ajouter', // Par défaut 'Ajouter' si aucune option n'est fournie
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TheatrePlay::class,
            'submit_label' => 'Ajouter', // Option par défaut
        ]);
    }
}
