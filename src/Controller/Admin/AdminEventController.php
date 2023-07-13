<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AdminEventController extends AbstractController
{
    private $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/admin/event", name="admin_event")
     */
    public function index() 
    {
        $events = $this->repository->findAll();
        return $this->render('admin/events/index.html.twig', compact('events'));
    }
}