<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturaRepository")
 */
class Factura
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

   

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $referencia;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

   

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proveedor", inversedBy="facturas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proveedor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="factura")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    

    public function __construct()
    {
        $this->compra = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }

    

    public function getProveedor(): ?Proveedor
    {
        return $this->proveedor;
    }

    public function setProveedor(?Proveedor $proveedor): self
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

   
}
