<?php

namespace App\Form;

use App\Entity\Gite;
use App\Entity\Contact;
use App\Model\SearchData;
use App\Entity\Equipement;
use App\Entity\Proprietaire;
use App\Entity\ServicePayant;
use Symfony\Component\Form\AbstractType;
use Symfony\Composant\Formulaire\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('choice', TextType::class, [
                'attr' => [
                    'placeholder' => 'Recherche via un mot clé...'
                ]
            ])
            ->add('search', SubmitType::class, [
                'label' => 'Recherche'
            ])
            ->add('filtres', EntityType::class, [
                'class' => ServicePayant::class,
                'expanded' => true,
                'multiple' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            //'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
