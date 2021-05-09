<?php

namespace App\Entity;

use App\Repository\CategoriasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriasRepository::class)
 */
class Categorias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=libros::class, inversedBy="categorias")
     */
    private $id_libro;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    public function __construct()
    {
        $this->id_libro = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|libros[]
     */
    public function getIdLibro(): Collection
    {
        return $this->id_libro;
    }

    public function addIdLibro(libros $idLibro): self
    {
        if (!$this->id_libro->contains($idLibro)) {
            $this->id_libro[] = $idLibro;
        }

        return $this;
    }

    public function removeIdLibro(libros $idLibro): self
    {
        $this->id_libro->removeElement($idLibro);

        return $this;
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
}
