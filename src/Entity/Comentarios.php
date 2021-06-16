<?php

namespace App\Entity;

use App\Repository\ComentariosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComentariosRepository::class)
 */
class Comentarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $texto;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_publicacion;

    /**
     * @ORM\Column(type="date")
     */
    private $ultima_edicion;

    /**
     * @ORM\ManyToOne(targetEntity=Noticias::class, inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $noticia;

    /**
     * @ORM\ManyToOne(targetEntity=Usuarios::class, inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\Column(type="boolean")
     */
    private $oculto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): self
    {
        $this->texto = $texto;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeInterface
    {
        return $this->fecha_publicacion;
    }

    public function setFechaPublicacion(\DateTimeInterface $fecha_publicacion): self
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

    public function getUltimaEdicion(): ?\DateTimeInterface
    {
        return $this->ultima_edicion;
    }

    public function setUltimaEdicion(\DateTimeInterface $ultima_edicion): self
    {
        $this->ultima_edicion = $ultima_edicion;

        return $this;
    }

    public function getNoticia(): ?Noticias
    {
        return $this->noticia;
    }

    public function setNoticia(?Noticias $noticia): self
    {
        $this->noticia = $noticia;

        return $this;
    }

    public function getUsuario(): ?Usuarios
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuarios $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getOculto(): ?bool
    {
        return $this->oculto;
    }

    public function setOculto(bool $oculto): self
    {
        $this->oculto = $oculto;

        return $this;
    }
}
