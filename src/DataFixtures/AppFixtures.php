<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');
        $user1 = [];
       for($i=1; $i<10 ; $i++){
           $user = new User();
           $mdp = $this->encoder->encodePassword($user, '12345');
           $user->setEmail($faker->email)
                ->setRoles($faker->sentence())
                ->setNom($faker->firstname)
                ->setPrenom($faker->lastname)
                ->setAdresse($faker->sentence())
                ->setVille($faker->sentence())
                ->setCodePostal('78900')
                ->setMdp($mdp);
            $manager->persist($user);
            $user1[] = $user;    
       }

        $manager->flush();
    }
}
