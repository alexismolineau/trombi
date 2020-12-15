<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Promotion;
use App\Entity\Student;
use App\Entity\Links;
use App\Form\LinksType;
use App\Form\StudentType;
use App\Form\PromotionFormType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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

        return $this->render('admin/promotion/listPromotions.html.twig', [
            'promotions' => $promotions,
        ]);
    }

    /**
     * @Route("/admin/promotions/{id}", name="admin_show_promotion")
     */
    public function showPromotion($id, Request $request) :Response
    {
        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(['id' => $id]);
        $students = $promotion->getStudent();

        $links = new Links;
        $links->setPromotion($promotion);
        $linksForm = $this->createForm(LinksType:: class, $links);

        $linksForm->handleRequest($request);
        if ($linksForm->isSubmitted() && $linksForm->isValid()) {
            

            $em = $this->getDoctrine()->getManager();
            $em->persist($links);
            $em->flush();
        }

        return $this->render('admin/promotion/showPromotion.html.twig', [
            'promotion' => $promotion,
            'students' => $students,
            'linksForm' => $linksForm->createView(),
        ]);
    }

    /**
     * @Route("/admin/promotion/add", name="admin_add_promotion")
     */
    public function addPromotion(Request $request) :Response
    {
        $promotion = new Promotion;
        $form = $this->createForm(PromotionFormType::class, $promotion);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            if ($promotion->getGroupPicture() !== null) {
                $file = $form->get('groupPicture')->getData();
                $fileName =  uniqid(). '.' .$file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('promotions_images_directory'), // Le dossier dans le quel le fichier va etre chargé
                        $fileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $promotion->setGroupPicture($fileName);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);
            $em->flush();

            $response = $this->forward('App\Controller\AdminController::showPromotion', [
                'id' => $promotion->getId(),
            ]);
            
            return $response;
        }

        return $this->render('admin/promotion/addPromotion.html.twig', [
            'promotionForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/promotions/mod/{id}", name="admin_mod_promotion")
     */
    public function modPromotion(Promotion $promotion, Request $request) :Response
    {

        $oldPicture = $promotion->getGroupPicture();

        $form = $this->createForm(PromotionFormType::class, $promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($promotion->getGroupPicture() !== null && $promotion->getGroupPicture() !== $oldPicture) {
                $file = $form->get('groupPicture')->getData();
                $fileName = uniqid(). '.' .$file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('students_images_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $promotion->setGroupPicture($fileName);
            } else {
                $promotion->setGroupPicture($oldPicture);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);
            $em->flush();

            $response = $this->forward('App\Controller\AdminController::showPromotion', [
                'id' => $promotion->getId(),
            ]);
            
            return $response;
        }

        return $this->render('admin/promotion/modPromotion.html.twig', [
            'promotionForm' => $form->createView(),
            'promotion' => $promotion,
        ]);
    }

    /**
     * @Route("/admin/promotions/del/{id}", name="admin_del_promotion")
     */
    public function delPromotion($id) :Response
    {
        $promotion = $this->getDoctrine()->getRepository(Promotion::class)->findOneBy(['id' => $id]);
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($promotion);
        $em->flush();

        return $this->redirect($this->generateUrl("admin_list_promotions"));
    }


    /**
     * @Route("/admin/link/del/{id}", name="admin_del_link")
     */
    public function delLink($id) :Response
    {
        $link = $this->getDoctrine()->getRepository(Links::class)->findOneBy(['id'=>$id]);

        $promotion = $link->getPromotion();

        $em = $this->getDoctrine()->getManager();
        $em->remove($link);
        $em->flush();

        return $this->redirect($this->generateUrl("admin_show_promotion", ['id' => $promotion->getId()]));
    }

    /**
     * @Route("/admin/students", name="admin_list_students")
     */
    public function listStudents() :Response
    {
        $students = $this->getDoctrine()->getRepository(Student::class)->findAll();

        return $this->render('admin/student/listStudents.html.twig', [
            'students' => $students,
        ]);
    }

    /**
     * @Route("/admin/students/{id}", name="admin_show_student")
     */
    public function showStudent($id) :Response 
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(['id' => $id]);

        return $this->render('admin/student/showStudent.html.twig', [
            'student' => $student,
        ]);
    }

    /**
     * @Route("/admin/student/add", name="admin_add_student")
     */
    public function addStudent(Request $request) :Response
    {
        $student = new Student;
        
        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            if($form->get('student')->getData() === 'student'){
                $student->setStudent(true);
                $student->setTeacher(false);
            }
            else {
                $student->setStudent(false);
                $student->setTeacher(true);
            }

            if ($student->getImgSrc() !== null) {
                $file = $form->get('imgSrc')->getData();
                $fileName =  uniqid(). '.' .$file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('students_images_directory'), // Le dossier dans le quel le fichier va etre chargé
                        $fileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $student->setImgSrc($fileName);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            $response = $this->forward('App\Controller\AdminController::showStudent', [
                'id' => $student->getId(),
            ]);
            
            return $response;
        }

        return $this->render('admin/student/addStudent.html.twig', [
            'addStudentForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/students/mod/{id}", name="admin_mod_student")
     */
    public function modSudent(Student $student, Request $request) :Response
    {
        $oldPicture = $student->getImgSrc();

        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($student->getImgSrc() !== null && $student->getImgSrc() !== $oldPicture) {
                $file = $form->get('imgSrc')->getData();
                $fileName = uniqid(). '.' .$file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('students_images_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $student->setImgSrc($fileName);
            } else {
                $student->setImgSrc($oldPicture);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            $response = $this->forward('App\Controller\AdminController::showStudent', [
                'id' => $student->getId(),
            ]);
            
            return $response;
        }

        return $this->render('admin/student/modStudent.html.twig', [
            'student' => $student,
            'addStudentForm' => $form->createview(),
        ]);
    }

    /**
     * @Route("/admin/students/del/{id}", name="admin_del_student")
     */
    public function delStudent($id) :Response
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findOneBy(['id'=>$id]);
        $em = $this->getDoctrine()->getManager();
        $em->remove($student);
        $em->flush();

        return $this->redirect($this->generateUrl("admin_list_students"));
    }


}


