<?php

namespace App\UseCases;

use App\Entity\Contact;
use App\Entity\Forms\ContactForm;
use App\Repository\ContactRepository;

class ContactService
{
    private $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ContactForm $form
     * @return Contact
     * @throws \Exception
     */
    public function create(ContactForm $form): Contact
    {
        $contact = Contact::create(
            $form->getName(),
            $form->getEmail(),
            $form->getSubject(),
            $form->getBody()
        );
        $this->repository->save($contact);

        return $contact;
    }
}