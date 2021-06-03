<?php

namespace App\Entity;

use App\Repository\EditorialesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditorialesRepository::class)
 */
class Editoriales
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Libros::class, mappedBy="editorial")
     */
    private $libros;


    public function __construct()
    {
        $this->libross = new ArrayCollection();
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

    /**
     * @return Collection|Libros[]
     */
    public function getLibros(): Collection
    {
        return $this->libros;
    }

    public function addLibros(Libros $libros): self
    {
        if (!$this->libros->contains($libros)) {
            $this->libros[] = $libros;
            $libros->setEditorial($this);
        }

        return $this;
    }

    public function removeLibross(Libros $libros): self
    {
        if ($this->libross->removeElement($libros)) {
            // set the owning side to null (unless already changed)
            if ($libros->getEditorial() === $this) {
                $libros->setEditorial(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }

}
