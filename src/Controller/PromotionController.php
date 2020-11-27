<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Promotion;

class PromotionController extends AbstractController
{
    /**
     * @Route("/", name="promotion")
     */
    public function index(): Response
    {
        $promotions = $this->getDoctrine()->getRepository(Promotion::class)->findAll();
        return $this->render('promotion/index.html.twig', [
            'promotions' => $promotions,
        ]);
    }
}
