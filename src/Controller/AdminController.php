<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Promotion;
use App\Entity\Student;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        $promotions = $this->getDoctrine()->getRepository(Promotion::class)->findAll();
        $students = $this->getDoctrine()->getRepository(Student::class)->findAll();


        return $this->render('admin/index.html.twig', [
            'promotions' => $promotions,
            'students' => $students,

        ]);
    }

    /**
     * @Route("/admin/promotions", name="admin_list_promotions")
     */
    public function listPromotions() :Response
    {
        $promotions = $this->getDoctrine()->getRepository(Promotion::class)->findAll();

        return $this->render('listPromotions.html.twig', [
            'promotions' => $promotions,
        ]);
    }

    /**
     * @Route("/admin/promotions/{$id}", name="admin_show_promotion")
     */
    public function showPromotion($id) :Response
    {
        $promotion = $this->getDoctrine()->getRepository(Promiton::class)->findOneBy(['id' => $id]);

        return $this->render('showPromotion.html.twig', [
            'promotion' => $promotion,
        ]);
    }


    /**
     * @Route("/admin/students", name="admin_list_students")
     */
    public function listStudents() :Response
    {
        $students = $this->getDoctrine()->getRepository(Student::class)->findAll();

        return $this->render('listStudents.html.twig', [
            'students' => $students,
        ]);
    }



}


