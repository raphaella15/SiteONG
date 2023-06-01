<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $req, EntityManagerInterface $manager, UserPasswordHasherInterface $hasher)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($req);
        $plainPassword = "totototo";
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $hasher->hashPassword($user, $plainPassword);
            $user->setPassword($hash);
            $manager->flush();
        }

        
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
