<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label' => false,
                'attr'=>array(
                    'placeholder'=>'image title'
                )
            ))

            ->add('filename', FileType::class, array(
                'label' => false,
                'attr'=>array(
                    'class'=>'form-control'
                )
            ))

           ->add('save', SubmitType::class, array(
               'label' => 'upload image',
                'attr' => array(
                    'class' => 'btn btn-primary btn-block'
                )
            ));
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
