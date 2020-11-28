<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StudentsListController extends AbstractController
{
    /**
     * @Route("/students/{promotion}", name="students_list")
     */
    public function index(int $promotion): Response
    {

        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(array('id' => $promotion));
        $students = $promotion->getStudent();
        return $this->render('students_list/index.html.twig', [
            'students' => $students,
            'promotion' => $promotion,
        ]);
    }

    /**
     * @Route("/student/{promotion}/{id}", name="student")
     */
    public function student(int $promotion,int $id): Response
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(array('id' => $id));
        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(array('id' =>$promotion));

        return $this->render('students_list/list.html.twig', [
            'student' => $student,
            'promotion' => $promotion,
        ]);
    }
}
