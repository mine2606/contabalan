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
     * @ORM\OneToMany(targetEntity="App\Entity\LineaPedido", mappedBy="pedido")
     */
    private $lineapedidos;

    public function __construct()
    {
        $this->lineapedidos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|LineaPedido[]
     */
    public function getLineapedidos(): Collection
    {
        return $this->lineapedidos;
    }

    public function addLineapedido(LineaPedido $lineapedido): self
    {
        if (!$this->lineapedidos->contains($lineapedido)) {
            $this->lineapedidos[] = $lineapedido;
            $lineapedido->setPedido($this);
        }

        return $this;
    }

    public function removeLineapedido(LineaPedido $lineapedido): self
    {
        if ($this->lineapedidos->contains($lineapedido)) {
            $this->lineapedidos->removeElement($lineapedido);
            // set the owning side to null (unless already changed)
            if ($lineapedido->getPedido() === $this) {
                $lineapedido->setPedido(null);
            }
        }

        return $this;
    }
}
