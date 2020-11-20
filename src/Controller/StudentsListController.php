<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentsListController extends AbstractController
{
    /**
     * @Route("/students/list", name="students_list")
     */
    public function index(): Response
    {
        return $this->render('students_list/index.html.twig', [
            'controller_name' => 'StudentsListController',
        ]);
    }
}
