<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VisionController extends AbstractController{

    function vision()
    {
        return $this->render('vision.html.twig');
    }

}