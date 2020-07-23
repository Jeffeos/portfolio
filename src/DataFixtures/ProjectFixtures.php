<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use DateTime;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [TechFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        // THE GREENER GOOD
        $project = new Project();
        $project->setName('The Greener Good');
        $project->setDate(new DateTime('2020-07-30'));
        $project->setDescription("
                With 4 fellow developpers, we developped a new extranet for The Greener Good association. 
                This website is used as a hub for all their projects, process, and member management. 
                We worked as a team, following the SCRUM principles with the use of GIT.
            ");
        $project->setDisplay(1);
        $project->setGithub("https://github.com/WildCodeSchool/lyon-php-2003-project3-greenergood");
        $project->setLink("http://garecentrale.thegreenergood.fr");
        $project->addTech($this->getReference("phpSymfony"));
        $project->addTech($this->getReference("javascript"));
        $manager->persist($project);
        $this->addReference("tgg", $project);

        // DOCTOPET
        $project = new Project();
        $project->setName('DOCTOPET');
        $project->setDate(new DateTime('2020-06-24'));
        $project->setDescription("
                We took part of the Wild Code School Hackathon with DOCTOLIB's sponsorship with our very own app: 
                an electronic pillbox for children with chronic diseases. With the help of a psychologist, we identified
                the key challenges for families facing this difficult challenge, and provided them with an app 
                with reminders and gamification aspect to help the child with his condition.
                We finished first out of 10 in our cluster and participated to the final. 
                We finished 5 out of about a 100 teams after the final presentation to DOCTOLIB!
            ");
        $project->setDisplay(1);
        $project->setGithub("https://github.com/Jeffeos/doctopet");
        $project->setLink("Not deployed yet");
        $project->addTech($this->getReference("phpSymfony"));
        $project->addTech($this->getReference("javascript"));
        $manager->persist($project);
        $this->addReference("doctopet", $project);

        // TVDB
        $project = new Project();
        $project->setName('TVDataBuzz');
        $project->setDate(new DateTime('2020-06-24'));
        $project->setDescription("
                With TVDB, we discovered the use of a TVShow API and used it to develop a website displaying all 
                your favourites TVShows! As a team, we worked on several features to display the shows and offer the 
                possibility to members to BUZZ they're favourite series and show the world, and their friends, 
                what THEY BUZZ! 
            ");
        $project->setDisplay(1);
        $project->setGithub("https://github.com/WildCodeSchool/lyon-php-2003-project2-databuzz");
        $project->setLink("Not deployed yet");
        $project->addTech($this->getReference("simpleMVC"));
        $project->addTech($this->getReference("javascript"));
        $manager->persist($project);
        $this->addReference("tvdb", $project);

        $manager->flush();
    }
}
