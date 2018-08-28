<?php

namespace App\Controller;

use App\Entity\Producto;

use App\Form\ProductoType;
use App\Repository\ProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/producto")
 */
class ProductoController extends Controller
{
    /**
     * @Route("/", name="producto_index", methods="GET")
     */
    public function index(ProductoRepository $productoRepository): Response
    {
        return $this->render('producto/index.html.twig', ['productos' => $productoRepository->findAll()]);
    }



     /**
     * @Route("/email", name="producto_email", methods="GET")
     */
    public function email(ProductoRepository $productoRepository, \Swift_Mailer $mailer)
    {
        $name = 'Minerva';
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo('minemarquez2606@gmail.com')
            ->setBody(
                $this->renderView(
                    // templates/emails/registration.html.twig
                    'emails/registration.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $mailer->send($message);
        return $this->render('producto/index.html.twig', ['productos' => $productoRepository->findAll()]);
    }



    /**
     * @Route("/new", name="producto_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $producto = new Producto();
        $form = $this->createForm(ProductoType::class, $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            return $this->redirectToRoute('producto_index');
        }

        return $this->render('producto/new.html.twig', [
            'producto' => $producto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producto_show", methods="GET")
     */
    public function show(Producto $producto): Response
    {
        return $this->render('producto/show.html.twig', ['producto' => $producto]);
    }

    /**
     * @Route("/{id}/edit", name="producto_edit", methods="GET|POST")
     */
    public function edit(Request $request, Producto $producto): Response
    {
        $form = $this->createForm(ProductoType::class, $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producto_edit', ['id' => $producto->getId()]);
        }

        return $this->render('producto/edit.html.twig', [
            'producto' => $producto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producto_delete", methods="DELETE")
     */
    public function delete(Request $request, Producto $producto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producto->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producto);
            $em->flush();
        }

        return $this->redirectToRoute('producto_index');
    }
}
