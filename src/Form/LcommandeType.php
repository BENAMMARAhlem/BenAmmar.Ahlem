<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Produit;
class LcommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('qte',TextType::class, array('label' => 'Quantité'))
        ->add('pu',TextType::class, array('label' => 'Prix Unitaire'))
        ->add('tva',TextType::class, array('label' => 'Tva'))
        ->add('id_produit',EntityType::class, ['class' => Produit::class,'choice_label' => 'Libelle'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
