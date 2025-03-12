<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomepageController extends AbstractController
{
    #[Route('/{_locale}/homepage', name: 'app_homepage')]
    public function index(Request $request): Response
    {
       $form = $this->createFormBuilder()->create('contactForm', ContactType::class)->getForm();
        
       $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', new TranslatableMessage('i_have_apples', ['%apples%' => $form->getData()['applesCount']]));

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'contact_form' => $form->createView()
        ]);
    }
}
