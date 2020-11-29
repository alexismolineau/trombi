<?php

namespace App\Controller;

use App\Form\PromotionSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\StudentSearchType;
use App\Repository\PromotionRepository;
use App\Repository\StudentRepository;

class SearchController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")
     */
    public function index(Request $request, StudentRepository $repo, PromotionRepository $repoPromo): Response
    {
        $studentForm = $this->createForm(StudentSearchType::class);
        $studentForm->handleRequest($request);

        $promotionForm = $this->createForm(PromotionSearchType::class);
        $promotionForm->handleRequest($request);

        if($studentForm->isSubmitted() && $studentForm->isValid()){

            $prenom = $studentForm['prenom']->getData();
            $nom = $studentForm['nom']->getData();

            $results = $repo->search($prenom, $nom);
            dump($results);

            return $this->render('search/results.html.twig', [
                'results' => $results,
                'studentSearchForm' => $studentForm->createView(),
                'promotionSearchForm' => $promotionForm->createView(),
            ]);

        }

        if($promotionForm->isSubmitted() && $promotionForm->isValid()){

            $nom = $promotionForm['nom']->getData();

            $resultsPromo = $repoPromo->search($nom);
            dump($resultsPromo);

            return $this->render('search/results.html.twig', [
                'resultsPromo' => $resultsPromo,
                'studentSearchForm' => $studentForm->createView(),
                'promotionSearchForm' => $promotionForm->createView(),
            ]);

        }

        return $this->render('search/index.html.twig', [
            'studentSearchForm' => $studentForm->createView(),
            'promotionSearchForm' => $promotionForm->createView(),
        ]);
    }
}
