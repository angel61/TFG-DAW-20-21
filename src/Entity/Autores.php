<?php

namespace App\Entity;

use App\Repository\AutoresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutoresRepository::class)
 */
class Autores
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $apellidos;

    /**
     * @ORM\OneToMany(targetEntity=Libros::class, mappedBy="id_autor")
     */
    private $libros;

    public function __construct()
    {
        $this->libros = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * @return Collection|Libros[]
     */
    public function getLibros(): Collection
    {
        return $this->libros;
    }

    public function addLibros(Libros $libro): self
    {
        if (!$this->Libros->contains($libro)) {
            $this->Libros[] = $libro;
            $libro->setIdAutor($this);
        }

        return $this;
    }

    public function removeLibros(Libros $libro): self
    {
        if ($this->Libros->removeElement($libro)) {
            // set the owning side to null (unless already changed)
            if ($libro->getIdAutor() === $this) {
                $libro->setIdAutor(null);
            }
        }

        return $this;
    }
}
