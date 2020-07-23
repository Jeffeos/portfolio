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
        return [ProjectFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        // THE GREENER GOOD
        $project = new Picture();
        $project->setName('d_tgg_action');
        $project->setUrl('5f192635854a1126732471.png');
        $project->setProject($this->getReference("tgg"));
        $manager->persist($project);

        $project = new Picture();
        $project->setName('m_tgg_action');
        $project->setUrl('5f1927617467e777981771.png');
        $project->setProject($this->getReference("tgg"));
        $manager->persist($project);

        $project = new Picture();
        $project->setName('d_tgg_trombi');
        $project->setUrl('5f1927a7e4af7935876683.png');
        $project->setProject($this->getReference("tgg"));
        $manager->persist($project);

        $project = new Picture();
        $project->setName('m_tgg_timeline');
        $project->setUrl('5f1927c55593f115034258.png');
        $project->setProject($this->getReference("tgg"));
        $manager->persist($project);

        // DOCTOPET
        $project = new Picture();
        $project->setName('d_doctopet_pet');
        $project->setUrl('5f1927ec164f5174103425.png');
        $project->setProject($this->getReference("doctopet"));
        $manager->persist($project);

        $project = new Picture();
        $project->setName('m_doctopet_pet');
        $project->setUrl('5f192822a2750316570922.png');
        $project->setProject($this->getReference("doctopet"));
        $manager->persist($project);

        $project = new Picture();
        $project->setName('d_doctopet_medicine');
        $project->setUrl('5f192836174e2214277093.png');
        $project->setProject($this->getReference("doctopet"));
        $manager->persist($project);

        $project = new Picture();
        $project->setName('d_doctopet_index');
        $project->setUrl('5f19284b82ebb058129594.png');
        $project->setProject($this->getReference("doctopet"));
        $manager->persist($project);

        $manager->flush();
    }
}
