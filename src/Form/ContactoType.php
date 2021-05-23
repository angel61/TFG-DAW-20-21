<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Introduce tu nombre',
                ],
                'label' => ' ' //placeholder="Introduce tu nombre"  class="input-borde" 
            ])
            ->add('from', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Introduce tu correo',
                ],
                'label' => ' ' //placeholder="Introduce tu correo" class="input-borde"
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Introduce tu mensaje',
                    'rows' => '4',
                    'cols' => '50-borde',
                ],
                'label' => ' ' //placeholder="Introduce tu mensaje" rows="4" cols="50" class="input-borde"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
