<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class ContactController extends AbstractController
{

    /*//_____________________________________________________________________________________________________________________
   //ROUTE->CONTACT */

    /*-----Public et envoie en BDD pour client: formulaire de contact---------*/
    /*-----ajouté une confirmation d'envoie-----------------*/
    /**
     * @Route("contact", name="contact")
     */
    public function contact(EntityManagerInterface $entityManager, Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $message = (new \Swift_Message('Nouveau message'))
                    ->setFrom($contact->getEmail())
                    ->setTo('annelamourpatisseries@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'user/_mail.html.twig', [
                                'prenom' => $contact->getPrenom(),
                                'nom' => $contact->getNom(),
                                'message' => $contact->getMessage()
                            ]
                        ),
                        'text/html'
                    );

                $mailer->send($message);

                $entityManager->persist($contact);
                $entityManager->flush();

                $this->addFlash('success', 'Votre message a bien été envoyé, merci ! Nous y répondrons dès que possible.');

                return $this->redirectToRoute('home');
                /*return $this->redirect($request->getUri());*/

            } else {

                $this->addFlash('fail', 'Votre message n\'a pas pu être envoyé.');

                return $this->render('contact/contact.html.twig', [
                    'formContactView' => $form->createView()
                ]);
            }
        }

        return $this->render('user/contact.html.twig', [
            'formContactView' => $form->createView()
        ]);
    }



}