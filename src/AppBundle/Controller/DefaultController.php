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
    public function add(Request $request){
        if (isset($_POST['adres']))
        {
           // var_dump($request->files->get('zal1'));
            $entityManager = $this ->getDoctrine() ->getManager();

            $data= new Przystanki();
            $data -> setAdresPrzystanku($_POST['adres']);
            $data -> setOpis($_POST['opis']);
            $data -> setIdentyfikator($_POST['identyfikator']);
            $data ->setZal1($_FILES['zal1']['name']);
            var_dump($_FILES['zal1']);
            $entityManager->persist($data);
            $entityManager->flush();
            
            
            $zal1=$request ->files->get('zal1');
            $destination=$this->getParameter('kernel.project.dir').'/uploads';
            $zal1->move($destination);
            
            return $this->render('default/addPrzystanek.html.twig', [

            ]);
        }
        else
        {
            return new Response('nie wpisałeś żadnych danych');
        }
    }
    
}
