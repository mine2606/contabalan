<?php

namespace App\Controller;

use App\Entity\Iva;
use App\Form\IvaType;
use App\Repository\IvaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/iva")
 */
class IvaController extends Controller
{
    /**
     * @Route("/", name="iva_index", methods="GET")
     */
    public function index(IvaRepository $ivaRepository): Response
    {
        return $this->render('iva/index.html.twig', ['ivas' => $ivaRepository->findAll()]);
    }

    /**
     * @Route("/new", name="iva_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $iva = new Iva();
        $form = $this->createForm(IvaType::class, $iva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($iva);
            $em->flush();

            return $this->redirectToRoute('iva_index');
        }

        return $this->render('iva/new.html.twig', [
            'iva' => $iva,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="iva_show", methods="GET")
     */
    public function show(Iva $iva): Response
    {
        return $this->render('iva/show.html.twig', ['iva' => $iva]);
    }

    /**
     * @Route("/{id}/edit", name="iva_edit", methods="GET|POST")
     */
    public function edit(Request $request, Iva $iva): Response
    {
        $form = $this->createForm(IvaType::class, $iva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('iva_edit', ['id' => $iva->getId()]);
        }

        return $this->render('iva/edit.html.twig', [
            'iva' => $iva,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="iva_delete", methods="DELETE")
     */
    public function delete(Request $request, Iva $iva): Response
    {
        if ($this->isCsrfTokenValid('delete'.$iva->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($iva);
            $em->flush();
        }

        return $this->redirectToRoute('iva_index');
    }
}
