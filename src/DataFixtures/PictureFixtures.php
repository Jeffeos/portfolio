<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use DateTime;

class PictureFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [ProjectFixtures::class, TechFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        // THE GREENER GOOD
        $projectPicture = new Picture();
        $projectPicture->setName('d_tgg_action');
        $projectPicture->setUrl('5f192635854a1126732471.png');
        $projectPicture->setProject($this->getReference("tgg"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('m_tgg_action');
        $projectPicture->setUrl('5f1927617467e777981771.png');
        $projectPicture->setProject($this->getReference("tgg"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('d_tgg_trombi');
        $projectPicture->setUrl('5f1927a7e4af7935876683.png');
        $projectPicture->setProject($this->getReference("tgg"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('m_tgg_timeline');
        $projectPicture->setUrl('5f1927c55593f115034258.png');
        $projectPicture->setProject($this->getReference("tgg"));
        $manager->persist($projectPicture);

        // DOCTOPET
        $projectPicture = new Picture();
        $projectPicture->setName('d_doctopet_pet');
        $projectPicture->setUrl('5f1927ec164f5174103425.png');
        $projectPicture->setProject($this->getReference("doctopet"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('m_doctopet_pet');
        $projectPicture->setUrl('5f192822a2750316570922.png');
        $projectPicture->setProject($this->getReference("doctopet"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('d_doctopet_medicine');
        $projectPicture->setUrl('5f192836174e2214277093.png');
        $projectPicture->setProject($this->getReference("doctopet"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('d_doctopet_index');
        $projectPicture->setUrl('5f19284b82ebb058129594.png');
        $projectPicture->setProject($this->getReference("doctopet"));
        $manager->persist($projectPicture);

        // TVDB
        $projectPicture = new Picture();
        $projectPicture->setName('d_tvdb_1');
        $projectPicture->setUrl('5f19389694183409715080.png');
        $projectPicture->setProject($this->getReference("tvdb"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('d_tvdb_2');
        $projectPicture->setUrl('5f1938b3d89c1824559466.png');
        $projectPicture->setProject($this->getReference("tvdb"));
        $manager->persist($projectPicture);

        $projectPicture = new Picture();
        $projectPicture->setName('d_tvdb_3');
        $projectPicture->setUrl('5f1938d7e2508889195560.png');
        $projectPicture->setProject($this->getReference("tvdb"));
        $manager->persist($projectPicture);


        // TECH
        $techPicture = new Picture();
        $techPicture->setName('symfony');
        $techPicture->setUrl('5f194a326b68b543700782.png');
        $techPicture->setTech($this->getReference('phpSymfony'));
        $manager->persist($techPicture);

        $techPicture = new Picture();
        $techPicture->setName('javascript');
        $techPicture->setUrl('5f1943e83a88a341196883.png');
        $techPicture->setTech($this->getReference('javascript'));
        $manager->persist($techPicture);

        $techPicture = new Picture();
        $techPicture->setName('simpleMVC');
        $techPicture->setUrl('5f1943d0b8f20863740110.png');
        $techPicture->setTech($this->getReference('simpleMVC'));
        $manager->persist($techPicture);

        $manager->flush();
    }
}
