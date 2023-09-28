<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Form\SendFormType;

class EmailController extends AbstractController
{
    #[Route("send-email", name:"send_email")]
    public function sendEmail(Request $request, MailerInterface $mailer, Environment $twig): Response
    {
        // return new Response('Email poster has been sent');
        $form = $this->createForm(SendFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newImage = $form->getData();
            // dd($form['name']->getData());
            $imagePath = $form->get('imagePath')->getData();
            if ($imagePath) {
                $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                try {
                    $imagePath->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }
                
                $newImage = '/uploads/' . $newFileName;
            }
            // dd($data);
            // Create the email
            $email = (new Email())
                ->from('serdarsaar2004@hotmail.com')
                ->to('087273@glr.nl')
                ->subject('New Bounty')
                // ->embedFromPath('/tmp/php', 'footer-signature', 'image/gif')
                ->html(
                    $twig->render('email_template.html.twig', [
                        'name' => $form['name']->getData(),
                        'description' => $form['description']->getData(),
                        'bounty' => $form['bounty']->getData(),
                        'image' => $newImage,
                    ])
                )
            ;

            // Send the email
            $mailer->send($email);

            return $this->redirectToRoute('characters'); // Redirect to the home page, for example
        }

        return $this->render('email_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
