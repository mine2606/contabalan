<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VentaRepository")
 */
class Venta extends Operacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="integer")
     */
    private $numfactura;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombrecliente;

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
    private $estado;

    public function getId()
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumfactura(): ?int
    {
        return $this->numfactura;
    }

    public function setNumfactura(int $numfactura): self
    {
        $this->numfactura = $numfactura;

        return $this;
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

    public function getNombrecliente(): ?string
    {
        return $this->nombrecliente;
    }

    public function setNombrecliente(string $nombrecliente): self
    {
        $this->nombrecliente = $nombrecliente;

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

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}
