<?php


namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Project;
use App\Entity\Tech;
use App\Entity\Picture;
use App\Form\PictureType;
use App\Form\ProjectType;
use App\Form\TechType;
use App\Repository\ContactRepository;
use App\Repository\PictureRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="index")
     */
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render("admin/index.html.twig", [
            'messages' => count($contactRepository->findBy(['messageRead' => false])),
        ]);
    }

    /**
     * @Route("/project/", name="project_index", methods={"GET"})
     */
    public function indexProject(ProjectRepository $projectRepository): Response
    {
        return $this->render('admin/project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/project/new", name="project_new", methods={"GET","POST"})
     */
    public function newProject(Request $request): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();

            $this->addFlash('success', 'The project has been successfully added');

            return $this->redirectToRoute('admin_project_index');
        }

        return $this->render('admin/project/new.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/project/{id}", name="project_show", methods={"GET"})
     */
    public function showProject(Project $project): Response
    {
        return $this->render('admin/project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/project/{id}/edit", name="project_edit", methods={"GET","POST"})
     */
    public function editProject(Request $request, Project $project): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The project has been successfully edited');

            return $this->redirectToRoute('admin_project_index');
        }

        return $this->render('admin/project/edit.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/project/{id}", name="project_delete", methods={"DELETE"})
     */
    public function deleteProject(Request $request, Project $project): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($project);
            $entityManager->flush();

            $this->addFlash('danger', 'The project has been successfully deleted');

        }

        return $this->redirectToRoute('admin_project_index');
    }

    /**
     * @Route("/tech/", name="tech_index", methods={"GET"})
     */
    public function indexTech(TechRepository $techRepository): Response
    {
        return $this->render('admin/tech/index.html.twig', [
            'techs' => $techRepository->findAll(),
        ]);
    }

    /**
     * @Route("/tech/new", name="tech_new", methods={"GET","POST"})
     */
    public function newTech(Request $request): Response
    {
        $tech = new Tech();
        $form = $this->createForm(TechType::class, $tech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tech);
            $entityManager->flush();

            $this->addFlash('success', 'The tech has been successfully added');

            return $this->redirectToRoute('admin_tech_index');
        }

        return $this->render('admin/tech/new.html.twig', [
            'tech' => $tech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/tech/{id}", name="tech_show", methods={"GET"})
     */
    public function showTech(Tech $tech): Response
    {
        return $this->render('admin/tech/show.html.twig', [
            'tech' => $tech,
        ]);
    }

    /**
     * @Route("/tech/{id}/edit", name="tech_edit", methods={"GET","POST"})
     */
    public function editTech(Request $request, Tech $tech): Response
    {
        $form = $this->createForm(TechType::class, $tech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The tech has been successfully edited');

            return $this->redirectToRoute('admin_tech_index');
        }

        return $this->render('admin/tech/edit.html.twig', [
            'tech' => $tech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/tech/{id}", name="tech_delete", methods={"DELETE"})
     */
    public function deleteTech(Request $request, Tech $tech): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tech->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tech);
            $entityManager->flush();

            $this->addFlash('danger', 'The tech has been successfully deleted');
        }

        return $this->redirectToRoute('admin_tech_index');
    }

    /**
     * @Route("/picture/", name="picture_index", methods={"GET"})
     */
    public function indexPicture(PictureRepository $pictureRepository): Response
    {
        return $this->render('admin/picture/index.html.twig', [
            'pictures' => $pictureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/picture/new", name="picture_new", methods={"GET","POST"})
     */
    public function newPicture(Request $request): Response
    {
        $picture = new Picture();
        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($picture);
            $entityManager->flush();

            $this->addFlash('success', 'The picture has been successfully added');

            return $this->redirectToRoute('admin_picture_index');
        }

        return $this->render('admin/picture/new.html.twig', [
            'picture' => $picture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/picture/{id}", name="picture_show", methods={"GET"})
     */
    public function showPicture(Picture $picture): Response
    {
        return $this->render('admin/picture/show.html.twig', [
            'picture' => $picture,
        ]);
    }

    /**
     * @Route("/picture/{id}/edit", name="picture_edit", methods={"GET","POST"})
     */
    public function editPicture(Request $request, Picture $picture): Response
    {
        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The picture has been successfully edited');

            return $this->redirectToRoute('admin_picture_index');
        }

        return $this->render('admin/picture/edit.html.twig', [
            'picture' => $picture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/picture/{id}", name="picture_delete", methods={"DELETE"})
     */
    public function deletePicture(Request $request, Picture $picture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$picture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($picture);
            dump($picture);

            $entityManager->flush();

            $this->addFlash('danger', 'The picture has been successfully deleted');
        }

        return $this->redirectToRoute('admin_picture_index');
    }

    /**
     * @Route("/contact/", name="contact_index", methods={"GET"})
     */
    public function contactIndex(ContactRepository $contactRepository): Response
    {
        return $this->render('admin/contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contact/{id}", name="contact_show", methods={"GET"})
     */
    public function contactShow(Contact $contact): Response
    {
        return $this->render('admin/contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/contact/{id}", name="contact_delete", methods={"DELETE"})
     */
    public function contactDelete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();

            $this->addFlash('danger', "Your message has been deleted successfully!");
        }

        return $this->redirectToRoute('admin_contact_index');
    }

    /**
     * @Route("/contact/read/{id}", name="contact_read", methods={"GET"})
     * @param Contact $contact
     * @return Response
     */
    public function contactRead(Contact $contact): Response
    {
        if ($contact->getMessageRead() == false)
        {
            $contact->setMessageRead(true);
            $this->addFlash('success', "Your message has been marked as read!");

        } else {
            $contact->setMessageRead(false);
            $this->addFlash('success', "Your message has been marked as unread!");
        }
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('admin_contact_index');
    }
}