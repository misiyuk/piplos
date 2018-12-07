<?php

namespace App\Entity\Forms;

/**
 * Class Contact
 * @package App\Forms
 *
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 */
class ContactForm
{
    protected $name;
    protected $email;
    protected $subject;
    protected $body;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }
}
