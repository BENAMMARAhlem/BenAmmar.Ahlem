<?php

namespace App\Form;
use App\Entity\Famille;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')

            ->add('libelle',TextType::class, array('label' => 'Produit :'))
            ->add('pa',TextType::class, array('label' => 'Prix Unitaire :'))
            ->add('pv',TextType::class, array('label' => 'Prix de vente :'))
            ->add('tva',TextType::class, array('label' => 'Tva :'))
            ->add('stock',TextType::class, array('label' => 'Stock :'))
            ->add('stockInit',TextType::class, array('label' => 'Stock Initial :'))
            ->add('stockalrt',TextType::class, array('label' => 'Stock Alert :'))
            ->add('id_famille')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
