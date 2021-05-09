<?php

namespace App\Entity;

use App\Repository\LibrosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * ORM\Entity(repositoryClass=LibrosRepository::class)
 */
class Libros_old
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_libro;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_autor;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_editorial;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $url_compra;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=13)
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
     * @ORM\Column(type="string", length=30)
     */
    private $idioma;

    /**
     * @ORM\Column(type="smallint")
     */
    private $destacado;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\Column(type="smallint")
     */
    private $activo;

    /**
     * @ORM\Column(type="date")
     */
    private $inicio_descuento;

    /**
     * @ORM\Column(type="date")
     */
    private $fin_descuento;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $descuento;

    /**
     * @ORM\Column(type="smallint")
     */
    private $top_ventas;

    public function getId(): ?int
    {
        return $this->id_libro;
    }

    public function getIdAutor(): ?int
    {
        return $this->id_autor;
    }

    public function setIdAutor(int $id_autor): self
    {
        $this->id_autor = $id_autor;

        return $this;
    }

    public function getIdEditorial(): ?int
    {
        return $this->id_editorial;
    }

    public function setIdEditorial(int $id_editorial): self
    {
        $this->id_editorial = $id_editorial;

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

    public function setEan(string $ean): self
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

    public function getDestacado(): ?int
    {
        return $this->destacado;
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

    public function getActivo(): ?int
    {
        return $this->activo;
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

    public function setInicioDescuento(\DateTimeInterface $inicio_descuento): self
    {
        $this->inicio_descuento = $inicio_descuento;

        return $this;
    }

    public function getFinDescuento(): ?\DateTimeInterface
    {
        return $this->fin_descuento;
    }

    public function setFinDescuento(\DateTimeInterface $fin_descuento): self
    {
        $this->fin_descuento = $fin_descuento;

        return $this;
    }

    public function getDescuento(): ?string
    {
        return $this->descuento;
    }

    public function setDescuento(string $descuento): self
    {
        $this->descuento = $descuento;

        return $this;
    }

    public function getTopVentas(): ?int
    {
        return $this->top_ventas;
    }

    public function setTopVentas(int $top_ventas): self
    {
        $this->top_ventas = $top_ventas;

        return $this;
    }
}
