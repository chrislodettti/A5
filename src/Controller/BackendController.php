<?php

namespace App\Controller;
use App\Entity\Post;
use App\Form\ModPasswordType;
use App\Form\ModUserNameType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BackendController extends Controller {
    public function index() {
        if(!$this->getUser()) {
            return $this->redirectToRoute('login');
        }
        return $this->render('dashboard/dashboard.html.twig');
    }
    public function posts() {
        if(!$this->getUser()) {
            return $this->redirectToRoute('login');
        }
        $posts = $this->getDoctrine()
                    ->getManager()
                    ->getRepository(Post::class)
                    ->findBy([ 'author' => $this->getUser() ]);
        return $this->render('dashboard/posts.html.twig', [
            'numPosts' => count($posts),
            'posts' => $posts
        ]);
    }
    public function account(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        if(!$this->getUser()) {
            return $this->redirectToRoute('login');
        }
        $formUsername = $this->createForm(ModUserNameType::class);
        $formUsername->handleRequest($request);
        $formPasswd = $this->createForm(ModPasswordType::class);
        $formPasswd->handleRequest($request);
        if($formUsername->isSubmitted() && $formUsername->isValid()) {
        }
        if($formPasswd->isSubmitted() && $formPasswd->isValid()) {
        }
        return $this->render('dashboard/account.html.twig', [
            'form_username' => $formUsername->createView(),
            'form_password' => $formPasswd->createView(),
            'user' => $this->getUser()
        ]);
    }
}