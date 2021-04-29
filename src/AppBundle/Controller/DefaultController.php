<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Przystanki;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/przystanki", name="homepage")
     */
    public function indexAction(Request $request)
    {
       
        return $this->render('default/index.html.twig', [
            
        ]);
    }
    /**
     * @Route("/przystanki/add")
     * Method({"POST"})
     */
    public function add(){
        $entityManager = $this ->getDoctrine() ->getManager();
        
        $data= new Przystanki();
        $data -> setAdresPrzystanku($_POST['adres']);
        $data -> setOpis($_POST['opis']);
        $data -> setIdentyfikator($_POST['identyfikator']);
        
        $entityManager->persist($data);
        $entityManager->flush();
        
        return $this->render('default/addPrzystanek.html.twig', [
            
        ]);
    }
    
}
