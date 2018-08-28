<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactoController extends Controller
{
    /**
     * @Route("/contacto", name="contacto")
     */
    public function index()
    {
        return $this->render('contacto/index.html.twig', [
            'controller_name' => 'ContactoController',
        ]);
    }
}
