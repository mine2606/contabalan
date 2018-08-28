<?php

namespace App\Controller;

use App\Entity\Operacion;
use App\Form\OperacionType;
use App\Repository\OperacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/operacion")
 */
class OperacionController extends Controller
{
    /**
     * @Route("/", name="operacion_index", methods="GET")
     */
    public function index(OperacionRepository $operacionRepository): Response
    {
        return $this->render('operacion/index.html.twig', ['operacions' => $operacionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="operacion_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $operacion = new Operacion();
        $form = $this->createForm(OperacionType::class, $operacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operacion);
            $em->flush();

            return $this->redirectToRoute('operacion_index');
        }

        return $this->render('operacion/new.html.twig', [
            'operacion' => $operacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="operacion_show", methods="GET")
     */
    public function show(Operacion $operacion): Response
    {
        return $this->render('operacion/show.html.twig', ['operacion' => $operacion]);
    }

    /**
     * @Route("/{id}/edit", name="operacion_edit", methods="GET|POST")
     */
    public function edit(Request $request, Operacion $operacion): Response
    {
        $form = $this->createForm(OperacionType::class, $operacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operacion_edit', ['id' => $operacion->getId()]);
        }

        return $this->render('operacion/edit.html.twig', [
            'operacion' => $operacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="operacion_delete", methods="DELETE")
     */
    public function delete(Request $request, Operacion $operacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$operacion->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operacion);
            $em->flush();
        }

        return $this->redirectToRoute('operacion_index');
    }
}
