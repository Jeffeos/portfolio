<?php


namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\PictureRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechRepository;
use App\Repository\UserRepository;
use App\Service\TechUsed;
use Symfony\Component\HttpFoundation\Request;
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
     * @param TechRepository $techRepository
     * @return Response
     */
    public function home(UserRepository $userRepository, ProjectRepository $projectRepository, TechRepository $techRepository, TechUsed $techUsed): Response
    {
        return $this->render('home.html.twig', [
            'user' => $userRepository->findOneBy(['lastname' => 'Delenne' ]),
            'projects' => $projectRepository->findBy(['display' => 1]),
            'techs' => $techRepository->findAll(),
            'percentUse' => $techUsed->percentUse($techRepository, $projectRepository),
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

    /**
     * @Route("/contact/", name="contact_new", methods={"GET","POST"})
     */
    public function contactNew(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', "Your message has been sent!");

            return $this->redirectToRoute('app_contact_new');
        }

        return $this->render('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/bio/", name="bio")
     */
    public function bio(UserRepository $userRepository): Response
    {
        return $this->render('bio/index.html.twig', [
            'user' => $userRepository->findOneBy(['lastname' => 'Delenne']),
        ]);
    }
}