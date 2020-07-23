<?php

namespace App\DataFixtures;

use App\Entity\Tech;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use DateTime;

class TechFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tech = new Tech();
        $tech->setName('PHP Symphony');
        $manager->persist($tech);
        $this->addReference('phpSymfony', $tech);

        $tech = new Tech();
        $tech->setName('Simple MVC');
        $manager->persist($tech);
        $this->addReference('simpleMVC', $tech);

        $tech = new Tech();
        $tech->setName('JavaScript');
        $manager->persist($tech);
        $this->addReference('javascript', $tech);

        $tech = new Tech();
        $tech->setName('GitHub');
        $manager->persist($tech);
        $this->addReference('github', $tech);

        $tech = new Tech();
        $tech->setName('Linkedin');
        $manager->persist($tech);
        $this->addReference('linkedin', $tech);

        $manager->flush();
    }
}
