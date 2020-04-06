<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientInscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('numero')
            ->add('codepostal', TextType::class, ["label"=>"Code postal"])
            ->add('ville')
            ->add('province')
            ->add('pays')
            ->add('mdp', PasswordType::class, ["label"=>"Mot de passe 8 caractères minimum"])
            ->add('confirmation_mdp', PasswordType::class, ["label"=>"Répétez le mot de passe"]) // -> ne fait pas partie de la BDD -> il faut créer une variable correspondante dans l'entité
            ->add('Soumettre', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
