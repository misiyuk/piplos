<?php

namespace App\Controller;

use App\Entity\Forms\ContactForm;
use App\UseCases\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @param Request $request
     * @param ContactService $service
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request, ContactService $service)
    {
        $contact = new ContactForm();
        $form = $this->createFormBuilder($contact)
            ->add('name', TextType::class)
            ->add('email', TextType::class)
            ->add('subject', TextType::class)
            ->add('body', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Отправить'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $service->create($contact);
            } catch (\Exception $e) {
                throw new \Exception('Can\'t create contact.');
            }

            return $this->render('contact/thank.html.twig', [
                'form' => $form->createView(),
            ]);
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
