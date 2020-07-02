<?php

namespace App\Form;
use App\Entity\Client;
use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numcom' ,TextType::class, array('label' => 'Numéro Commande'))
            ->add('dateComm',DateType::class,['label' => 'Date Commande:   : ','widget' => 'single_text'])
            ->add('TotalTax',TextType::class, array('label' => 'Total Tax'))
            ->add('TotalTva',TextType::class, array('label' => 'Total Tva'))
            ->add('TotalTtc',TextType::class, array('label' => 'Total Ttc'))
            ->add('id_Client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'Designation',
            ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
