<?php

namespace App\Controller\Admin\Member;

use App\Entity\Member;
use App\Form\MemberType;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/member")
 */
class AdminMemberController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_member_index", methods={"GET"})
     */
    public function index(MemberRepository $memberRepository): Response
    {
        return $this->render('admin_member/index.html.twig', [
            'members' => $memberRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_member_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MemberRepository $memberRepository): Response
    {
        $member = new Member();
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $memberRepository->add($member, true);

            return $this->redirectToRoute('app_admin_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_member/new.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_member_show", methods={"GET"})
     */
    public function show(Member $member): Response
    {
        return $this->render('admin_member/show.html.twig', [
            'member' => $member,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_member_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Member $member, MemberRepository $memberRepository): Response
    {
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $memberRepository->add($member, true);

            return $this->redirectToRoute('app_admin_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_member/edit.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_member_delete", methods={"POST"})
     */
    public function delete(Request $request, Member $member, MemberRepository $memberRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$member->getId(), $request->request->get('_token'))) {
            $memberRepository->remove($member, true);
        }

        return $this->redirectToRoute('app_admin_member_index', [], Response::HTTP_SEE_OTHER);
    }
}
