<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StrategieController extends AbstractController{

    function strategie()
    {
        return $this->render('strategie_manageriale.html.twig');
    }

}