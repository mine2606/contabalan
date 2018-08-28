<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompraRepository")
 */
class Compra extends Operacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factura", inversedBy="compras")
     * @ORM\JoinColumn(nullable=false)
     */
    private $factura;

    /**
     * @ORM\Column(type="date")
     */
    private $fechafactura;

    /**
     * @ORM\Column(type="integer")
     */
    private $referencia;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $pendiente;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $estadopago;

    public function getId()
    {
        return $this->id;
    }

    public function getFactura(): ?Factura
    {
        return $this->factura;
    }

    public function setFactura(?Factura $factura): self
    {
        $this->factura = $factura;

        return $this;
    }

    public function getFechafactura(): ?\DateTimeInterface
    {
        return $this->fechafactura;
    }

    public function setFechafactura(\DateTimeInterface $fechafactura): self
    {
        $this->fechafactura = $fechafactura;

        return $this;
    }

    public function getReferencia(): ?int
    {
        return $this->referencia;
    }

    public function setReferencia(int $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

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

    public function getPendiente(): ?string
    {
        return $this->pendiente;
    }

    public function setPendiente(?string $pendiente): self
    {
        $this->pendiente = $pendiente;

        return $this;
    }

    public function getEstadopago(): ?string
    {
        return $this->estadopago;
    }

    public function setEstadopago(?string $estadopago): self
    {
        $this->estadopago = $estadopago;

        return $this;
    }
}
