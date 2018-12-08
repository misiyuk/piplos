<?php

namespace App\Controller;

use App\Entity\Forms\ContactForm;
use App\UseCases\ContactService;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactController extends FOSRestController
{
    /**
     * @param Request $request
     * @param ContactService $service
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Exception
     */
    public function index(Request $request, ContactService $service, ValidatorInterface $validator)
    {
        $contact = $this->deserialize($request);
        $errors = $validator->validate($contact);
        if (!$errors->count()) {
            try {
                $service->create($contact);
            } catch (\Exception $e) {
                throw new \Exception('Can\'t create contact.');
            }
        } else {
            return $this->json([
                'myError' => 'Incorrect data',
                'form' => $request->query->all(),
            ]);
        }

        return $this->json([
            'status' => 'OK',
        ]);
    }

    private function deserialize(Request $request): ContactForm
    {
        $contact = new ContactForm();
        $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $body = $request->get('body');
        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setSubject($subject);
        $contact->setBody($body);

        return $contact;
    }
}