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
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LineaPedido", mappedBy="producto")
     */
    private $lineasPedido;

    public function __construct()
    {
        $this->lineasPedido = new ArrayCollection();
    }  


    public function getId()
    {
        return $this->id;
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
     * @return Collection|LineaPedido[]
     */
    public function getLineasPedido(): Collection
    {
        return $this->lineasPedido;
    }

    public function addLineasPedido(LineaPedido $lineasPedido): self
    {
        if (!$this->lineasPedido->contains($lineasPedido)) {
            $this->lineasPedido[] = $lineasPedido;
            $lineasPedido->setProducto($this);
        }

        return $this;
    }

    public function removeLineasPedido(LineaPedido $lineasPedido): self
    {
        if ($this->lineasPedido->contains($lineasPedido)) {
            $this->lineasPedido->removeElement($lineasPedido);
            // set the owning side to null (unless already changed)
            if ($lineasPedido->getProducto() === $this) {
                $lineasPedido->setProducto(null);
            }
        }

        return $this;
    }

    

    
}
