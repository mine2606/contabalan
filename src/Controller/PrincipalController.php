<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Form\UserType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class PrincipalController extends Controller
{
    /**
     * @Route("/principal", name="principal")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder, AuthenticationUtils $authenticationUtils): Response
    {

    	$user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        dump($authenticationUtils);
        // get the login error if there is one
        $error = $authenticationUtils -> getLastAuthenticationError ();
        dump ($error);
        // last username entered by the user
        $lastUsername = $authenticationUtils -> getLastUsername ();


        if ($form->isSubmitted() && $form->isValid()) {

        	$password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
        	$user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('principal');
        }
        return $this->render('principal/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),

            'last_username' => $lastUsername ,
            'error'         => $error ,

        ]);
    }


}
