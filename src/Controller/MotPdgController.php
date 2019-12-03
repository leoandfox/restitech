<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MotPdgController extends AbstractController{

    function motpdg()
    {
        return $this->render('mot_pdg.html.twig');
    }

}