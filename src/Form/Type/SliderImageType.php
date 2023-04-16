<?php

declare(strict_types=1);

namespace Allekslar\SliderPlugin\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class SliderImageType extends ImageType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'sylius.ui.description',
                'required' => false,
            ])
            ->add('anchor', TextType::class, [
                'label' => 'allekslar_slider.ui.anchor',
                'required' => false,
            ])
            ->add('type', TextType::class, [
                'label' => 'allekslar_slider.form.image.url',
                'required' => false,
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'allekslar_slider_image';
    }
}
