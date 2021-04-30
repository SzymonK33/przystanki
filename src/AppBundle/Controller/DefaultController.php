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
            $data ->setOdczytano($_POST['odczytano']);
            
            //Operacje na zalaczniku 1
            
            /** @var UploadedFile $zal1*/
            $zal1=$request ->files->get('zal1');
            $destination = $this ->getParameter('kernel.project_dir').'/uploads';
            $newName = uniqid().'-'.$zal1->getClientOriginalName();
            $zal1->move($destination,$newName);
            
            $data ->setZal1($newName);
            var_dump($_FILES['zal1']);
            $entityManager->persist($data);
            $entityManager->flush();
            
            return $this->render('default/addPrzystanek.html.twig', [

            ]);
        }
        else
        {
            return new Response('nie wpisałeś żadnych danych');
        }
    }
    
}
