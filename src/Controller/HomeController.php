<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\JeuxvideoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(JeuxvideoRepository $jeuxvideoRepo, UserRepository $userRepository): Response
    {
        $jeuxvideo = $jeuxvideoRepo->findAll();
        $user = $userRepository->findAll();

        return $this->render('home/index.html.twig', [
            'jeuxvideo' => $jeuxvideo,
            'users' => $user
        ]);
    }
}
