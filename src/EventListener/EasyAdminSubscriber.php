<?php

namespace App\EventListener;

use App\Entity\Libros;
use App\Entity\Usuarios;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityBuiltEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
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
            $descripcionArray = explode("<br><br>", $descripcionLarga);
            $descripcionCorta = $descripcionArray[0];
            if ($descripcionArray > 1)
                $descripcionNormal = $descripcionCorta . '<br><br>' . $descripcionArray[1];
            else
                $descripcionNormal = $descripcionCorta;

            $entity->setDescripcionCorta($descripcionCorta);
            $entity->setDescripcion($descripcionNormal);
            return;
        }
        if (($entity instanceof Usuarios) && (($event instanceof BeforeEntityPersistedEvent) || ($event instanceof BeforeEntityUpdatedEvent))) {

            $entity->setPassword(
                $this->passwordEncoder->encodePassword(
                    $entity,
                    $entity->getPassword()
                )
            );

            return;
        }
    }
}
