<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation',TextType::class, array('label' => 'Désignation :'))
            ->add('RespComm',TextType::class, array('label' => 'Responsable Commercial :'))
            ->add('RespFinan',TextType::class, array('label' => 'Responsable Financier :'))
            ->add('adrLiv',TextType::class, array('label' => 'Adresse Livraison :'))
            ->add('adrFacture',TextType::class, array('label' => 'Adresse Facture :'))
            ->add('tel',TextType::class, array('label' => 'Téléphone :'))
            ->add('portable',TextType::class, array('label' => 'Numéro Portable :'))
            ->add('fax',TextType::class, array('label' => 'Fax :'))
            ->add('email',TextType::class, array('label' => 'Email :'))
            ->add('soldeInit',TextType::class, array('label' => 'Solde Initial :'))
            ->add('solde',TextType::class, array('label' => 'Solde :'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
