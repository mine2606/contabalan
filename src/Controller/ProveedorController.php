<?php

namespace App\Controller;

use App\Entity\Proveedor;
use App\Form\ProveedorType;
use App\Repository\ProveedorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/proveedor")
 */
class ProveedorController extends Controller
{
   
     /**
     * @Route("/", name="proveedor_index", methods="GET|POST")
     */
    public function index(ProveedorRepository $proveedorRepository, Request $request): Response
    {
        $proveedor = new Proveedor();
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proveedor);
            $em->flush();

            return $this->redirectToRoute('proveedor_index');
        }

        return $this->render('proveedor/index.html.twig', [
            'proveedor' => $proveedorRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/new", name="proveedor_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $proveedor = new Proveedor();
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proveedor);
            $em->flush();

            return $this->redirectToRoute('proveedor_index');
        }

        return $this->render('proveedor/new.html.twig', [
            'proveedor' => $proveedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proveedor_show", methods="GET")
     */
    public function show(Proveedor $proveedor): Response
    {
        return $this->render('proveedor/show.html.twig', ['proveedor' => $proveedor]);
    }

    /**
     * @Route("/{id}/edit", name="proveedor_edit", methods="GET|POST")
     */
    public function edit(Request $request, Proveedor $proveedor): Response
    {
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proveedor_edit', ['id' => $proveedor->getId()]);
        }

        return $this->render('proveedor/edit.html.twig', [
            'proveedor' => $proveedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proveedor_delete", methods="DELETE")
     */
    public function delete(Request $request, Proveedor $proveedor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proveedor->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proveedor);
            $em->flush();
        }

        return $this->redirectToRoute('proveedor_index');
    }
}
