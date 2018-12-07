<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    /**
     * @param Contact $contact
     * @throws \Exception
     */
    public function save(Contact $contact)
    {
        $em = $this->getEntityManager();
        try {
            $em->persist($contact);
            $em->flush();
        } catch (\Exception $e) {
            throw new \Exception('Can\'t save contact');
        }
    }
}
