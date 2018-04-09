<?php
namespace App\Controller;
use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PostController extends Controller {
    
    public function post($id) {
        $post = $this->getDoctrine()
                    ->getRepository(Post::class)
                    ->find($id);
        return $this->render('post.html.twig', [
            'post' => $post
        ]);
    }
    public function createPost(Request $request) {
        $post = new Post();
        $form = $this->createForm(PostType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($post);
            $manager->flush();
            return $this->redirectToRoute('dashboard_posts');
        }
        return $this->render('dashboard/posteditor.html.twig', [
           'form' => $form->createView()
        ]);
    }
}