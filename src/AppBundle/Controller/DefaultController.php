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
        if ($_POST['adres']!='')
        {
            $entityManager = $this ->getDoctrine() ->getManager();

                $data= new Przystanki();
                $data -> setAdresPrzystanku($_POST['adres']);
                $data -> setOpis($_POST['opis']);
                $data -> setIdentyfikator($_POST['identyfikator']);
                $data ->setOdczytano($_POST['odczytano']);
                
                $filesArr = isset($_FILES['zal1'])? $_FILES['zal1'] : array();
                
                if($filesArr['name'][0]!='')
                {
                    
                    // tablica z do walidowania dodanych zdjec
                    $valIm[0]='image/jpeg';
                    $valIm[1]='image/png';
                    $valIm[2]='image/gif';

                    $number=0;
                    //$filesArr = isset($_FILES['zal1'])? $_FILES['zal1'] : array();
                    foreach ($filesArr['name'] as $index=>$zal1)
                    {
                        
                        $ifvalid=1;           
                        if(in_array($filesArr['type'][$index],$valIm)||$filesArr['type'][$index]=='')
                        {
                            $number++;
                        }
                        else
                        {
                            $number++;
                            $ifvalid=0;
                        }          
                    }
                    if($ifvalid!='0'&&$number<4)
                    {
                        foreach ($filesArr['name'] as $index=>$zal1)
                        {
                            
                            $variable=$index+1;

                            $destination = $this ->getParameter('kernel.project_dir').'/uploads/';
                            $newName = uniqid().'-'.$filesArr['name'][$index];
                            move_uploaded_file($filesArr['tmp_name'][$index], $destination.$newName);

                            $set='setZal'.$variable;
                            $data ->$set($newName);
       
                        }
                        $entityManager->persist($data);
                        $entityManager->flush();       
                        return $this->render('default/addPrzystanek.html.twig', []);
                    }else
                    {
                        return new Response('Jeden z plików posiada zły format/wysłałeś za dużo plików');
                    }  
                }
                else
                {
                    $entityManager->persist($data);
                    $entityManager->flush();
                    return new Response('dodano');
                }  
        }
        else
        {
            return new Response('nie wpisałeś żadnych danych/ nie podałeś adresu');
        }
    }
    
}
