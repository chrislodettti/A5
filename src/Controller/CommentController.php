<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class CommentController extends Controller
{
    public function index()
    {
        // replace this line with your own code!
       return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
}