<?php

namespace App\Controller;

use App\Entity\LineaPedido;
use App\Form\LineaPedidoType;
use App\Repository\LineaPedidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pedido;
use App\Entity\Producto;

/**
 * @Route("/linea/pedido")
 */
class LineaPedidoController extends Controller
{
    /**
     * @Route("/", name="linea_pedido_index", methods="GET")
     */
    public function index(LineaPedidoRepository $lineaPedidoRepository): Response
    {
        return $this->render('linea_pedido/index.html.twig', ['linea_pedidos' => $lineaPedidoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="linea_pedido_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $lineaPedido = new LineaPedido();
        $form = $this->createForm(LineaPedidoType::class, $lineaPedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lineaPedido);
            $em->flush();

            return $this->redirectToRoute('linea_pedido_index');
        }

        return $this->render('linea_pedido/new.html.twig', [
            'linea_pedido' => $lineaPedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="linea_pedido_show", methods="GET")
     */
    public function show(LineaPedido $lineaPedido): Response
    {
        return $this->render('linea_pedido/show.html.twig', ['linea_pedido' => $lineaPedido]);
    }

    /**
     * @Route("/{id}/edit", name="linea_pedido_edit", methods="GET|POST")
     */
    public function edit(Request $request, LineaPedido $lineaPedido): Response
    {
        $form = $this->createForm(LineaPedidoType::class, $lineaPedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('linea_pedido_edit', ['id' => $lineaPedido->getId()]);
        }

        return $this->render('linea_pedido/edit.html.twig', [
            'linea_pedido' => $lineaPedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="linea_pedido_delete", methods="DELETE")
     */
    public function delete(Request $request, LineaPedido $lineaPedido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lineaPedido->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lineaPedido);
            $em->flush();
        }

        return $this->redirectToRoute('linea_pedido_index');
    }
}
