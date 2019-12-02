<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController{

    function about()
    {
        return $this->render('about.html.twig');
    }

}