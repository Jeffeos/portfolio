<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('geoffrey.delenne@gmail.com');
        $user->setFirstname('Geoffrey');
        $user->setLastname('Delenne');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setBrief("Welcome! I'm an agile developer trained in PHP Symfony and many other tools necessaries to develop modern websites!");
        $user->setLinkedin("https://www.linkedin.com/in/geoffrey-delenne/");
        $user->setGithub("https://github.com/Jeffeos");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'password'
        ));
        $manager->persist($user);

        $manager->flush();
    }
}
