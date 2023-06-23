<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="app_event")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $events = $doctrine->getRepository(Event::class)->findAll();

        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
            'events' => $events
        ]);
    }

    /**
     * @Route("/event/new", name="event_create")
     */
    public function create(Request $request, EntityManagerInterface $manager) 
    {

        $event = new Event();
        $form = $this->createFormBuilder($event)
                     ->add('title')
                     ->add('content')
                     ->add('image')
                     ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $event->setCreatedAt(new \DateTime());
            $manager->persist($event);
            $manager->flush();
            return $this->redirectToRoute('event_show', ['id' => $event->getId()]);
        }
        
        return $this->render('event/create.html.twig',[
            'formEvent' => $form->createView()
        ]);
    }

    /**
     * @Route("/event/{id}", name="event_show")
     */
    public function show(ManagerRegistry $doctrine, $id) 
    {
        
        $event = $doctrine->getRepository(Event::class)->find($id);
        return $this->render('event/show.html.twig', [
            'event' => $event
        ]);
    }
}
