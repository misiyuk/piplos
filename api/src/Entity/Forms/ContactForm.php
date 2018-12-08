<?php

namespace App\Entity\Forms;

use Symfony\Component\Validator\Constraints as Assert;

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

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     * @Assert\Email()
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @Assert\NotBlank()
     */
    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
}
