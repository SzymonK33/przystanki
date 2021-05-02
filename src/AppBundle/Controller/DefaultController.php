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
            // tablica z do walidowania dodanych zdjec
                $valIm[0]='image/jpeg';
                $valIm[1]='image/png';
                $valIm[2]='image/gif';
                //var_dump($_FILES);
                if(in_array($_FILES['zal1']['type'],$valIm)||$_FILES['zal1']['error']!='')
                {
                    if(in_array($_FILES['zal2']['type'],$valIm)||$_FILES['zal2']['error']!='')
                    {
                         if(in_array($_FILES['zal3']['type'],$valIm)||$_FILES['zal3']['error']!='')
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
                             if($_FILES['zal1']['error']=='')
                             {
                                $zal1=$request ->files->get('zal1');
                                $destination = $this ->getParameter('kernel.project_dir').'/uploads';
                                $newName = uniqid().'-'.$zal1->getClientOriginalName();
                                $zal1->move($destination,$newName);
                                $data ->setZal1($newName);
                             }
                             /** @var UploadedFile $zal2*/
                             if($_FILES['zal2']['error']=='')
                             {
                                $zal2=$request ->files->get('zal2');
                                $destination = $this ->getParameter('kernel.project_dir').'/uploads';
                                $newName = uniqid().'-'.$zal2->getClientOriginalName();
                                $zal2->move($destination,$newName);
                                $data ->setZal2($newName);
                             }
                             if($_FILES['zal3']['error']=='')
                             {
                                $zal3=$request ->files->get('zal3');
                                $destination = $this ->getParameter('kernel.project_dir').'/uploads';
                                $newName = uniqid().'-'.$zal3->getClientOriginalName();
                                $zal3->move($destination,$newName);
                                $data ->setZal3($newName);
                             }
                             //var_dump($_FILES['zal1']);
                             $entityManager->persist($data);
                             $entityManager->flush();

                             return $this->render('default/addPrzystanek.html.twig', [

                             ]);
                         }else
                         {
                             return new Response('zły format pliku graficznego numer 3');
                         }
                    }else
                    {
                        return new Response('zły format pliku graficznego numer 2');
                    }
                 
                }
                else
                {
                    return new Response('zły format pliku graficznego numer 1');

                }  
        }
        else
        {
            return new Response('nie wpisałeś żadnych danych');
        }
    }
    
}
