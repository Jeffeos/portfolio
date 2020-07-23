<?php


namespace App\Controller;

use App\Repository\PictureRepository;
use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Project;

/**
 * Class AppController
 * @package App\Controller
 * @Route(name="app_")
 */
class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param UserRepository $userRepository
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function home(UserRepository $userRepository, ProjectRepository $projectRepository): Response
    {
        return $this->render('home.html.twig', [
            'user' => $userRepository->findOneBy(['lastname' => 'Delenne' ]),
            'projects' => $projectRepository->findBy(['display' => 1]),
        ]);
    }

    /**
     * @Route("/project/{id}", name="project_show", methods={"GET"})
     * @param Project $project
     * @param PictureRepository $pictureRepository
     * @return Response
     */
    public function appShowProject(Project $project, PictureRepository $pictureRepository): Response
    {
        return $this->render('/project/show.html.twig', [
            'project' => $project,
            'githubPic' => $pictureRepository->findOneBy(['name' => 'github']),
        ]);
    }

}