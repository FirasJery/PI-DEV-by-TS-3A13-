<?php

namespace App\Form;
use App\Entity\Offre;
use App\Entity\Postulation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class PostulationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    
        $builder->add('idOffre', EntityType::class, [
            'class' => Offre::class,
            'choice_label' => 'title',
            'mapped' => false, // this will prevent the field from being bound to the entity
        ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Postulation::class,
        ]);
    }
}
