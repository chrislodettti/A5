<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class TagController extends Controller
{
    public function index()
    {
        // replace this line with your own code!
       return $this->render('tag/index.html.twig', [
            'controller_name' => 'TagController',
        ]);
    }
}