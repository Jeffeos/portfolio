<?php

namespace App\Service;

use App\Repository\ProjectRepository;
use App\Repository\TechRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechUsed extends AbstractController
{
    public function percentUse(TechRepository $techRepository, ProjectRepository $projectRepository): array
    {
        $techs = $techRepository->findAll();
        // dump($techs);
        $projectsTotal = count($projectRepository->findAll());

        // Add each tech as key and %  of use as value
        $percentUse = [];
        // Calculate the percentage of use of each tech I used: X projects out of X
        foreach ($techs as $tech)
        {
            $nbProjectsUsingTech = count($tech->getProjects());
            $percent = round(($nbProjectsUsingTech / $projectsTotal * 100), 0);
            $percentUse[$tech->getName()] = $percent;
        }
        dump($percentUse);

        return $percentUse;
    }
}