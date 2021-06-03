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
     * @ORM\ManyToMany(targetEntity=Libros::class, mappedBy="autores")
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

    public function addLibro(Libros $libro): self
    {
        if (!$this->libros->contains($libro)) {
            $this->libros[] = $libro;
            $libro->addAutore($this);
        }

        return $this;
    }

    public function removeLibro(Libros $libro): self
    {
        if ($this->libros->removeElement($libro)) {
            $libro->removeAutore($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre." ".$this->apellidos;
    }
}
