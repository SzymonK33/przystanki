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
       
        return $this->render('default/adminDetails.html.twig', [ 
           
        ]);
    }

    
}
