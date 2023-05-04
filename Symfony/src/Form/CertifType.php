<?php

namespace App\Form;

use App\Entity\Certif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class CertifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('descrip')
            ->add('badge', FileType::class, [
                'label' => 'Image (JPG file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        
                        'mimeTypesMessage' => 'Please upload a valid JPG document',
                    ])
                ],
            ]) ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Certif::class,
        ]);
    }
}
