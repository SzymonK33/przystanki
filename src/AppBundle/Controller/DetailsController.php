<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Przystanki;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends Controller
{
    /**
     * @Route("/admin/details", name="details")
     */
    
    public function indexAction()
    {
       if(isset($_POST['id']))
       {
           // zmiana flagi przy adresie przystanku
           $entityManager= $this ->getDoctrine() ->getManager();
           $data= $this -> getDoctrine()->getRepository('AppBundle:Przystanki')->find($_POST['id']);
           $data -> setOdczytano('1');
           $entityManager->persist($data);

           return $this->render('default/adminDetails.html.twig', [ 'data'=>$data
        ]);
         $entityManager->flush();
       }else
       {
           return new Response('Najpierw wejdź na /admin');
       }
    } 
}
