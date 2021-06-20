<?php

namespace App\EventListener;

use App\Entity\Libros;
use App\Entity\Usuarios;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    private $entityManager;
    private $passwordEncoder;
    public function __construct(EntityManagerInterface $entityManager,UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager=$entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityUpdatedEvent::class => ['setVariablesLibros'],
            BeforeEntityPersistedEvent::class => ['setVariablesLibros'],
        ];
    }

    public function setVariablesLibros($event)
    {
        $entity = $event->getEntityInstance();
        if (($entity instanceof Libros) && (($event instanceof BeforeEntityPersistedEvent) || ($event instanceof BeforeEntityUpdatedEvent))) {

            if ($entity->getUrlPortada() == null) {
                $entity->setUrlPortada('default.jpg');
            }

            $descripcionLarga = $entity->getDescripcionLarga();
            try {
                $descripcionArray = explode("<br><br>", $descripcionLarga);
                $descripcionCorta = $descripcionArray[0];
                if ($descripcionArray > 1)
                    $descripcionNormal = $descripcionCorta . '<br><br>' . $descripcionArray[1];
                else
                    $descripcionNormal = $descripcionCorta;

                $entity->setDescripcionCorta($descripcionCorta.'</div>');
                $entity->setDescripcion($descripcionNormal.'</div>');
                return;
            } catch (Exception $ex) {
            }
            try {
                $descripcionArray = explode(".", $descripcionLarga);
                $descripcionCorta = $descripcionArray[0];
                if ($descripcionArray > 1)
                    $descripcionNormal = $descripcionCorta . '.' . $descripcionArray[1];
                else
                    $descripcionNormal = $descripcionCorta;

                    $entity->setDescripcionCorta($descripcionCorta.'</div>');
                    $entity->setDescripcion($descripcionNormal.'</div>');
                return;
            } catch (Exception $ex) {
            }
            $entity->setDescripcionCorta($descripcionLarga);
            $entity->setDescripcion($descripcionLarga);
            return;
        }
        if (($entity instanceof Usuarios) && (($event instanceof BeforeEntityPersistedEvent) || ($event instanceof BeforeEntityUpdatedEvent))) {

            if ($entity->getPassword()!==null) {
                $entity->setPassword(
                    $this->passwordEncoder->encodePassword(
                        $entity,
                        $entity->getPassword()
                    )
                );
            } else {
                $id=$entity->getId();
                $password=$this->entityManager->find($id)['password'];
                
                $entity->setPassword($password);
            }

            return;
        }
    }
}
