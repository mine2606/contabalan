<?php

namespace App\Controller;

use App\Entity\Gestoria;
use App\Form\GestoriaType;
use App\Repository\GestoriaRepository;
use App\Repository\EmpresaRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/gestoria")
 */
class GestoriaController extends Controller
{
    /**
     * @Route("/", name="gestoria_index", methods="GET")
     */
    public function index(GestoriaRepository $gestoriaRepository, Request $request ): Response
    {
        return $this->render('gestoria/index.html.twig', [
            'gestorias' => $gestoriaRepository->findAll()]);
    }


    /**
     * @Route("/new", name="gestoria_new", methods="GET|POST")
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $gestorium = new Gestoria();
        $form = $this->createForm(GestoriaType::class, $gestorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($gestorium, $gestorium->getPlainPassword());
            $gestorium->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($gestorium);
            $em->flush();

            return $this->redirectToRoute('gestoria_index');
        }

        return $this->render('gestoria/new.html.twig', [
            'gestorium' => $gestorium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gestoria_show", methods="GET")
     */
    public function show(Gestoria $gestorium): Response
    {
        return $this->render('gestoria/show.html.twig', ['gestorium' => $gestorium]);
    }

    /**
     * @Route("/{id}/edit", name="gestoria_edit", methods="GET|POST")
     */
    public function edit(Request $request, Gestoria $gestorium): Response
    {
        $form = $this->createForm(GestoriaType::class, $gestorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gestoria_edit', ['id' => $gestorium->getId()]);
        }

        return $this->render('gestoria/edit.html.twig', [
            'gestorium' => $gestorium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gestoria_delete", methods="DELETE")
     */
    public function delete(Request $request, Gestoria $gestorium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gestorium->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gestorium);
            $em->flush();
        }

        return $this->redirectToRoute('gestoria_index');
    }
}
