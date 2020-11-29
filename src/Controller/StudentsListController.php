<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\Promotion;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\StudentSearchType;


class StudentsListController extends AbstractController
{
    /**
     * @Route("/students/{promotion}", name="students_list")
     */
    public function index(int $promotion): Response
    {

        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(array('id' => $promotion));
        $students = $promotion->getStudent();
        $links = $promotion->getLinks();
        return $this->render('students_list/index.html.twig', [
            'students' => $students,
            'promotion' => $promotion,
            'links' => $links,
        ]);
    }

    /**
     * @Route("/student/{promotion}/{id}", name="student")
     */
    public function student(int $promotion,int $id, Request $request, StudentRepository $repo): Response
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(array('id' => $id));
        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(array('id' =>$promotion));
        $links = $promotion->getLinks();

        return $this->render('students_list/list.html.twig', [
            'student' => $student,
            'promotion' => $promotion,
            'links' => $links,
        ]);
    }



}
