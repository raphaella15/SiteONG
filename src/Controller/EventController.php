<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Images;
use App\Form\EventType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @Route("/event/{id}/edit", name="event_edit")
     */
    public function form(Event $event = null ,Request $request, EntityManagerInterface $manager) 
    {

        if(!$event)
        {
            $event = new Event();
        }
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $images = $form->get('images')->getData();
            foreach ($images as $image) {
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter(('uploads'),
                    $fichier
                    )
                );

                $img = new Images();
                $img->setName($fichier);
                $event->addImage($img);
            } 
            if(!$event->getId()) 
            {
                $event->setCreatedAt(new \DateTime());
            }
            $manager->persist($event);
            $manager->flush();
            return $this->redirectToRoute('event_show', ['id' => $event->getId()]);
        }
        
        return $this->render('event/create.html.twig',[
            'formEvent' => $form->createView(),
            'editMode' => $event->getId() !== null
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
