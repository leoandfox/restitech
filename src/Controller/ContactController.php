<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController{

    function contact()
    {
        return $this->render('contact.html.twig');
    }

}