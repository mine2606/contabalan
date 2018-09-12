<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numpedido;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LineaPedido", mappedBy="pedido", orphanRemoval=true)
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

    

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNumpedido(): ?int
    {
        return $this->numpedido;
    }

    public function setNumpedido(?int $numpedido): self
    {
        $this->numpedido = $numpedido;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

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
            $lineasPedido->setPedido($this);
        }

        return $this;
    }

    public function removeLineasPedido(LineaPedido $lineasPedido): self
    {
        if ($this->lineasPedido->contains($lineasPedido)) {
            $this->lineasPedido->removeElement($lineasPedido);
            // set the owning side to null (unless already changed)
            if ($lineasPedido->getPedido() === $this) {
                $lineasPedido->setPedido(null);
            }
        }

        return $this;
    }

    
}
