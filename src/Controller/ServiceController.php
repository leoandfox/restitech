<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceController extends AbstractController{

    function telecommunication()
    {
        return $this->render('telecommunication.html.twig');
    }
    function batiment()
    {
        return $this->render('batiment.html.twig');
    }
    function electricite()
    {
        return $this->render('electricite.html.twig');
    }

}