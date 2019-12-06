<?php
namespace App\Controller;

use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactController extends AbstractController{

    function contact(Request $request,MailerInterface $mailer)
    {
        $message = new Message();
        $statusMessage="";
        $form = $this->createFormBuilder()
             ->add('lastname', TextType::class, array('required' => true,'attr' => array('placeholder' => 'Nom(s)*')))
             ->add('subject', TextType::class, array( 'required' => true,'attr' => array('placeholder' => 'Sujet*')))
             ->add('email', EmailType::class, array( 'required' => true,'attr' => array('placeholder' => 'Email*')))
             ->add('telephone', TextType::class, array('required' => true,'attr' => array('placeholder' => 'Téléphone*')))
             ->add('content', TextareaType::class, array('required' => true,'attr' => array('placeholder' => 'Message*')))
             ->add('save', SubmitType::class, array('label' => 'ENVOYEZ'))
             ->getForm();
         $form->handleRequest($request);
        /* $email = (new Email())
            ->from('website@restitechsarl.com')
            ->to('info@restitechsarl.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('222 Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        $mailer->send($email);*/
        if ($form->isSubmitted() && $form->isValid()) {
             $message = $form->getData();
             $mailToSend = (new TemplatedEmail())
                 ->from('website@restitechsarl.com')
                 ->to('info@restitechsarl.com')
                 ->htmlTemplate('emails/contact.html.twig')
                 ->context([
                    'lastname' => $message['lastname'],
                    'subject' => $message['subject'],
                    'emailcustomer' => $message['email'],
                    'telephone' => $message['telephone'],
                    'content' => $message['content'],
                ])
             ;
             $mailer->send($mailToSend);
             if($mailer)
             {
                 $statusMessage="Votre message a bien été envoyé";
             }else{
                $statusMessage="Votre message n'a pas pu être envoyé";
             }
             return $this->render('contact.html.twig', [
                'controller_name' => 'ContactController',
                'form' => $form->createView(),
                'messageStatus'=> $statusMessage,
            ]);
         }
         return $this->render('contact.html.twig', [
             'controller_name' => 'ContactController',
             'form' => $form->createView(),
             'messageStatus'=> $statusMessage,
         ]);
        //return $this->render('');
    }
    function contactFooter(Request $request,MailerInterface $mailer)
    {
        $message = new Message();
        $form = $this->createFormBuilder()
             ->add('lastname', TextType::class, array('required' => true,'attr' => array('placeholder' => 'Nom(s)*')))
             ->add('email', EmailType::class, array( 'required' => true,'attr' => array('placeholder' => 'Email*')))
             ->add('content', TextareaType::class, array('required' => true,'attr' => array('placeholder' => 'Message*')))
             ->add('save', SubmitType::class, array('label' => 'ENVOYEZ'))
             ->getForm();
         $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
             $message = $form->getData();
             $mailToSend = (new TemplatedEmail())
                 ->from('website@restitechsarl.com')
                 ->to('info@restitechsarl.com')
                 ->htmlTemplate('emails/contact.html.twig')
                 ->context([
                    'lastname' => $message['lastname'],
                    'emailcustomer' => $message['email'],
                    'content' => $message['content'],
                ])
             ;
             $mailer->send($mailToSend);
             //return $this->redirectToRoute('contact');
         }
        /* return $this->render('contact.html.twig', [
             'controller_name' => 'ContactController',
             'form' => $form->createView(),
         ]);*/
        //return $this->render('');
        return $this->redirectToRoute('index');
    }

}