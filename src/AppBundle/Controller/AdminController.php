<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Przystanki;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    
    public function indexAction()
    {
       $data= $this -> getDoctrine()->getRepository('AppBundle:Przystanki')->findAll();
        return $this->render('default/admin.html.twig', [ 
            'data'=>$data
        ]);
    }

    
}
