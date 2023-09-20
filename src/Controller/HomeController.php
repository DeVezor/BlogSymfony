<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // Заглушка
        $posts = [
            [
                'title' => 'Заголовок поста 1',
                'content' => 'Содержание первого поста...',
            ],
            [
                'title' => 'Заголовок поста 2',
                'content' => 'Содержание второго поста...',
            ],
        ];

        return $this->render('home/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
