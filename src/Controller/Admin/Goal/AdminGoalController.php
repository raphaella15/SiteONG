<?php

namespace App\Controller\Admin\Goal;

use App\Entity\Goal;
use App\Form\GoalType;
use App\Repository\GoalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/goal")
 */
class AdminGoalController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_goal_index", methods={"GET"})
     */
    public function index(GoalRepository $goalRepository): Response
    {
        return $this->render('admin_goal/index.html.twig', [
            'goals' => $goalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_goal_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GoalRepository $goalRepository): Response
    {
        $goal = new Goal();
        $form = $this->createForm(GoalType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goalRepository->add($goal, true);

            return $this->redirectToRoute('app_admin_goal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_goal/new.html.twig', [
            'goal' => $goal,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_goal_show", methods={"GET"})
     */
    public function show(Goal $goal): Response
    {
        return $this->render('admin_goal/show.html.twig', [
            'goal' => $goal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_goal_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Goal $goal, GoalRepository $goalRepository): Response
    {
        $form = $this->createForm(GoalType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goalRepository->add($goal, true);

            return $this->redirectToRoute('app_admin_goal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_goal/edit.html.twig', [
            'goal' => $goal,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_goal_delete", methods={"POST"})
     */
    public function delete(Request $request, Goal $goal, GoalRepository $goalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$goal->getId(), $request->request->get('_token'))) {
            $goalRepository->remove($goal, true);
        }

        return $this->redirectToRoute('app_admin_goal_index', [], Response::HTTP_SEE_OTHER);
    }
}
