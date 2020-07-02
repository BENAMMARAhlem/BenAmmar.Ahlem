<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {  
       $user=new User();
       $user->setusername('Admin');
       $user->setEmail('admin@admin.com');
       $user->setRoles(['ROLE_ADMIN']);
       $user->setPassword(
        $this->passwordEncoder->encodePassword(
            $user,'admin'
        )
    );
       $manager->persist($user);
       $user=new User();
       $user->setusername('ahlem');
       $user->setEmail('ahlemuser@gmail.com');
       $user->setRoles(['ROLE_USER']);
       $user->setPassword(
        $this->passwordEncoder->encodePassword(
            $user,'gldra2020'
        )
    );

        $manager->persist($user);
        $manager->flush();
    }
}
