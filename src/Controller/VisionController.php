<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisionController extends AbstractController
{
    /**
     * @Route("/vision", name="app_vision")
     */
    public function index(): Response
    {
        return $this->render('vision/index.html.twig', [
            'controller_name' => 'VisionController',
        ]);
    }
}
