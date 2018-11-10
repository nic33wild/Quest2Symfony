<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LuckyController extends AbstractController
{
    /**
    * @Route("/lucky/number")
    */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
            'slug' => ''
        ));
    }

    /**
    * @Route("/test/{devastante}")
    */
    public function test($devastante)
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'  '.$devastante.'</body></html>'
        );
    }

    /**
    * @Route("/blog/{slug}", requirements={"slug"="([a-z0-9\-\.]*)"}, name="blog")
    */
    public function blog($slug = "article-sans-titre")
    {   $slug = show($slug, "-");
        return $this->render('lucky/blogslug.html.twig', array(
            'slug' => $slug
        ));
    }
}

    function show($mot, $separator){
            $str = $mot;
            $str = str_replace($separator," ", $str);
            $str = ucwords(strtolower($str));
            return $str;
      }
        


