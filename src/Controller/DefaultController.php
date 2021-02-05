<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/job", name="job")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
