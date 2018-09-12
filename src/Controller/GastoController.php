<?php

namespace App\Controller;

use App\Entity\Gasto;
use App\Form\GastoType;
use App\Repository\GastoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gasto")
 */
class GastoController extends Controller
{
    /**
     * @Route("/", name="gasto_index", methods="GET")
     */
    public function index(GastoRepository $gastoRepository): Response
    {
        return $this->render('gasto/index.html.twig', ['gastos' => $gastoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="gasto_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $gasto = new Gasto();
        $form = $this->createForm(GastoType::class, $gasto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gasto);
            $em->flush();

            return $this->redirectToRoute('gasto_index');
        }

        return $this->render('gasto/new.html.twig', [
            'gasto' => $gasto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gasto_show", methods="GET")
     */
    public function show(Gasto $gasto): Response
    {
        return $this->render('gasto/show.html.twig', ['gasto' => $gasto]);
    }

    /**
     * @Route("/{id}/edit", name="gasto_edit", methods="GET|POST")
     */
    public function edit(Request $request, Gasto $gasto): Response
    {
        $form = $this->createForm(GastoType::class, $gasto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gasto_edit', ['id' => $gasto->getId()]);
        }

        return $this->render('gasto/edit.html.twig', [
            'gasto' => $gasto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gasto_delete", methods="DELETE")
     */
    public function delete(Request $request, Gasto $gasto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gasto->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gasto);
            $em->flush();
        }

        return $this->redirectToRoute('gasto_index');
    }
}
