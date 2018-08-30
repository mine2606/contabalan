<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Iva", inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $iva;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lineadepedidos", mappedBy="producto", orphanRemoval=true)
     */
    private $lineadepedidos;

    public function __construct()
    {
        $this->lineadepedidos = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

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

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getIva(): ?Iva
    {
        return $this->iva;
    }

    public function setIva(?Iva $iva): self
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * @return Collection|Lineadepedidos[]
     */
    public function getLineadepedidos(): Collection
    {
        return $this->lineadepedidos;
    }

    public function addLineadepedido(Lineadepedidos $lineadepedido): self
    {
        if (!$this->lineadepedidos->contains($lineadepedido)) {
            $this->lineadepedidos[] = $lineadepedido;
            $lineadepedido->setProducto($this);
        }

        return $this;
    }

    public function removeLineadepedido(Lineadepedidos $lineadepedido): self
    {
        if ($this->lineadepedidos->contains($lineadepedido)) {
            $this->lineadepedidos->removeElement($lineadepedido);
            // set the owning side to null (unless already changed)
            if ($lineadepedido->getProducto() === $this) {
                $lineadepedido->setProducto(null);
            }
        }

        return $this;
    }

}
