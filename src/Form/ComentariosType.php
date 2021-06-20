<?php

namespace App\Form;

use App\Entity\Comentarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComentariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comentario', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Introduce tu comentario',
                    'rows' => '4',
                    'cols' => '50-borde',
                ],
                'label' => ' ' //placeholder="Introduce tu mensaje" rows="4" cols="50" class="input-borde"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // 'data_class' => Comentarios::class,
        ]);
    }
}
