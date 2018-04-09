<?php

namespace App\Controller;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {
    
    public function home() {
        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();
        return $this->render("home/index.html.twig", [
            'posts' => $posts
        ]);
    }
    
}