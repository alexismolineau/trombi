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
     * @Route("/admin/promotions/{id}", name="admin_show_promotion")
     */
    public function showPromotion($id) :Response
    {
        $promotion = $this->getDoctrine()->getRepository(Promiton::class)->findOneBy(['id' => $id]);

        return $this->render('showPromotion.html.twig', [
            'promotion' => $promotion,
        ]);
    }

    /**
     * @Route("/admin/promotions/add", name="admin_add_promotion")
     */
    public function addPromotion() :Response
    {
        $promotion = new Promotion;

        //TODO form add promotion
        $form = '';


        return $this->render('addPromotion.html.twig', [
            //'addPromotionForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/promotions/mod/{id}", name="admin_mod_promotion")
     */
    public function modPromotion($id) :Response
    {

        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(['id' => $id]);

        //TODO form mod promotion
        $form = '';

        return $this->render('modPromotion.html.twig', [
            //'modPromotionForm' => $form->createView(),
            'promotion' => $promotion,
        ]);
    }

    /**
     * @Route("/admin/promotions/del/{id}", name="admin_del_promotion")
     */
    public function delPromotion($id) :Response
    {
        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(['id' => $id]);
        //TODO form delete promotion``
        $form = '';

        return $this->render('delPromotion.html.twig', [
            //'delPromotionForm' => $form->createView(),
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

    /**
     * @Route("/admin/students/{id}", name="admin_show_student")
     */
    public function showStudent($id) :Response 
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(['id' => $id]);

        return $this->render('showStudent.hmtl.twig', [
            'student' => $student,
        ]);
    }

    /**
     * @Route("/admin/students/add", name="admin_add_student")
     */
    public function addStudent() :Response
    {
        $student = new Student;

        //TODO form add student
        $form = '';

        return $this->render('addStudent.html.twig', [
            //'addStudentForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/students/mod/{id}", name="admin_show_student")
     */
    public function modSudent($id) :Response
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(['id'=>$id]);
        // TODO student mod form
        $form = '';

        return $this->render('modStudent.html.twig', [
            'student' => $student,
            //'modStudentForm' => $form->createview(),
        ]);
    }

    public function delStudent($id) :Response
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(['id'=>$id]);
        //TODO student delete form
        $form = '';

        return $this->render('delStudent.html.twig', [
            'student' => $student,
            //'delStudentForm' => $form->createView(),
        ]);
    }


    //TODO promotion links methods (and forms)
}


