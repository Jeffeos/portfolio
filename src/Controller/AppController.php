<?php


namespace App\Controller;

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
            'projects' => $projectRepository->findAll(),
        ]);
    }
}