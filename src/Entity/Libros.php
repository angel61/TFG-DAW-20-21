<?php

namespace App\Entity;

use App\Repository\LibrosRepository;
use DateTime;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass=LibrosRepository::class)
 */
class Libros
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $url_compra;

    /**
     * @ORM\Column(type="string", length=18)
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=18, nullable=true)
     */
    private $ean;

    /**
     * @ORM\Column(type="integer")
     */
    private $paginas;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion_corta;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion_larga;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_publicacion;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $idioma;

    /**
     * @ORM\Column(type="boolean")
     */
    private $destacado = 0;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo = 0;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $inicio_descuento;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fin_descuento;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $descuento;

    /**
     * @ORM\Column(type="boolean")
     */
    private $top_ventas = 0;

    /**
     * @ORM\ManyToMany(targetEntity=Categorias::class, inversedBy="libros")
     */
    private $categorias;

    /**
     * @ORM\ManyToOne(targetEntity=Editoriales::class, inversedBy="libros")
     */
    private $editorial;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $url_portada;

    /**
     * @ORM\ManyToMany(targetEntity=Autores::class, inversedBy="libros")
     */
    private $autores;

    public function __construct()
    {
        $this->categorias = new ArrayCollection();
        $this->autores = new ArrayCollection();
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

    public function getUrlCompra(): ?string
    {
        return $this->url_compra;
    }

    public function setUrlCompra(string $url_compra): self
    {
        $this->url_compra = $url_compra;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(?string $ean): self
    {
        $this->ean = $ean;

        return $this;
    }

    public function getPaginas(): ?int
    {
        return $this->paginas;
    }

    public function setPaginas(int $paginas): self
    {
        $this->paginas = $paginas;

        return $this;
    }

    public function getDescripcionCorta(): ?string
    {
        return $this->descripcion_corta;
    }

    public function setDescripcionCorta(string $descripcion_corta): self
    {
        $this->descripcion_corta = $descripcion_corta;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getDescripcionLarga(): ?string
    {
        return $this->descripcion_larga;
    }

    public function setDescripcionLarga(string $descripcion_larga): self
    {
        $this->descripcion_larga = $descripcion_larga;

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

    public function getIdioma(): ?string
    {
        return $this->idioma;
    }

    public function setIdioma(string $idioma): self
    {
        $this->idioma = $idioma;

        return $this;
    }

    public function getDestacado(): ?bool
    {
        return boolval($this->destacado);
    }

    public function setDestacado(int $destacado): self
    {
        $this->destacado = $destacado;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return boolval($this->activo);
    }

    public function setActivo(int $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getInicioDescuento(): ?\DateTimeInterface
    {
        return $this->inicio_descuento;
    }

    public function setInicioDescuento(?\DateTimeInterface $inicio_descuento): self
    {
        $this->inicio_descuento = $inicio_descuento;

        return $this;
    }

    public function getFinDescuento(): ?\DateTimeInterface
    {
        return $this->fin_descuento;
    }

    public function setFinDescuento(?\DateTimeInterface $fin_descuento): self
    {
        $this->fin_descuento = $fin_descuento;

        return $this;
    }

    public function getDescuento(): ?string
    {
        return $this->descuento;
    }

    public function setDescuento(?string $descuento): self
    {
        $this->descuento = $descuento;

        return $this;
    }

    public function getTopVentas(): ?bool
    {
        return boolval($this->top_ventas);
    }

    public function setTopVentas(int $top_ventas): self
    {
        $this->top_ventas = $top_ventas;

        return $this;
    }

    /**
     * @return Collection|Categorias[]
     */
    public function getCategorias(): Collection
    {
        return $this->categorias;
    }

    public function addCategoria(Categorias $categoria): self
    {
        if (!$this->categorias->contains($categoria)) {
            $this->categorias[] = $categoria;
            $categoria->addLibros($this);
        }

        return $this;
    }

    public function removeCategoria(Categorias $categoria): self
    {
        if ($this->categorias->removeElement($categoria)) {
            $categoria->removeLibros($this);
        }

        return $this;
    }

    public function getEditorial(): ?Editoriales
    {
        return $this->editorial;
    }

    public function setEditorial(?Editoriales $editorial): self
    {
        $this->editorial = $editorial;

        return $this;
    }

    public function getUrlPortada(): ?string
    {
        if ($this->url_portada === null)
            return 'default.jpg';
        return $this->url_portada;
    }

    public function setUrlPortada(?string $url_portada): self
    {
        $this->url_portada = $url_portada;

        return $this;
    }

    /**
     * @return Collection|Autores[]
     */
    public function getAutores(): Collection
    {
        return $this->autores;
    }

    public function addAutore(Autores $autore): self
    {
        if (!$this->autores->contains($autore)) {
            $this->autores[] = $autore;
        }

        return $this;
    }

    public function removeAutore(Autores $autore): self
    {
        $this->autores->removeElement($autore);

        return $this;
    }
}
