<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;


class StudentsListController extends AbstractController
{
    /**
     * @Route("/", name="students_list")
     */
    public function index(): Response
    {
        $students = $this->getDoctrine()->getRepository(Student::class)->findAll();
        return $this->render('students_list/index.html.twig', [
            'controller_name' => 'StudentsListController',
            'students' => $students,
        ]);
    }

    /**
     * @Route("/student/{id}", name="student")
     */
    public function student(int $id): Response
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(array('id' => $id));

        return $this->render('students_list/list.html.twig', [
            'student' => $student,
        ]);
    }
}
