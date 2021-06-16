<?php

namespace App\Entity;

use App\Repository\ComentariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity=Comentarios::class, inversedBy="comentarios")
     */
    private $padre;

    /**
     * @ORM\OneToMany(targetEntity=Comentarios::class, mappedBy="padre")
     */
    private $comentarios;

    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
    }

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

    public function getPadre(): ?self
    {
        return $this->padre;
    }

    public function setPadre(?self $padre): self
    {
        $this->padre = $padre;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(self $comentario): self
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios[] = $comentario;
            $comentario->setPadre($this);
        }

        return $this;
    }

    public function removeComentario(self $comentario): self
    {
        if ($this->comentarios->removeElement($comentario)) {
            // set the owning side to null (unless already changed)
            if ($comentario->getPadre() === $this) {
                $comentario->setPadre(null);
            }
        }

        return $this;
    }
}
