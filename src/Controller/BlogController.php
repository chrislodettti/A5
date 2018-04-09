<?php

use App\Entity\Post;
use App\Form\ModPasswordType;
use App\Form\ModUserNameType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
namespace App\Controller;

/**
 * Description of BlogController
 *
 * @author linux
 */
class BlogController {
     public function newPost(Request $request){
        $post = new Post();
        $post->setTitle('Write a blog title post');
        //Formulario
        
        
        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class)
            ->add('content', TextType::class)
                ->add('user', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();
 
        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
            $post=$form->getData();
           
            return $this->redirectToRoute('homeaction');
            
        }
        return $this->render('blog/post_form.html.twig', ['form'=>$form->createView()]);
    }
}
