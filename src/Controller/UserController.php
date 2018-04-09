<?php
namespace App\Controller;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class UserController extends Controller {
    private $session;
    public function __construct() {
        $this->session = new Session();
    }
    public function index() {
     
        return $this->render('user/index.html.twig', [ 
             'controller_name' => 'UserController', ]);
    }
    public function login(Request $request, AuthenticationUtils $authUtils) {
        $error = $authUtils->getLastAuthenticationError();
        $lastUserName = $authUtils->getLastUsername();
 
        return $this->render('user/login.html.twig', [
            'error' => $error,
            'lastUserName' => $lastUserName
        ]);
    }
    public function logout() {
        $this->redirectToRoute('logout');
    }
    //REGISTER
    public function signup(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        $usr = new User();
        $form = $this->createForm(RegisterType::class, $usr);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($usr, $usr->getPassword());
            $usr->setPassword($password);
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($usr);
            $manager->flush();
            return $this->redirectToRoute('login');
        }
        return $this->render('user/registrarse.html.twig', [
            'form' => $form->createView()
        ]);
    }
    public function testUserName(Request $request) {
        $username = $request->get('username');
        $manager = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('User')
                        ->findOneBy(['username' => $username]);
    }
}


