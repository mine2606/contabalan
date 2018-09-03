<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nif;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $calle;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $cpostal;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $poblacion;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $provincia;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factura", mappedBy="cliente", orphanRemoval=true)
     */
    private $factura;

    public function __construct()
    {
        $this->factura = new ArrayCollection();
       
    }

    public function getId()
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

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): self
    {
        $this->nif = $nif;

        return $this;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCpostal(): ?string
    {
        return $this->cpostal;
    }

    public function setCpostal(string $cpostal): self
    {
        $this->cpostal = $cpostal;

        return $this;
    }

    public function getPoblacion(): ?string
    {
        return $this->poblacion;
    }

    public function setPoblacion(string $poblacion): self
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * @return Collection|Factura[]
     */
    public function getFactura(): Collection
    {
        return $this->factura;
    }

    public function addFactura(Factura $factura): self
    {
        if (!$this->factura->contains($factura)) {
            $this->factura[] = $factura;
            $factura->setCliente($this);
        }

        return $this;
    }

    public function removeFactura(Factura $factura): self
    {
        if ($this->factura->contains($factura)) {
            $this->factura->removeElement($factura);
            // set the owning side to null (unless already changed)
            if ($factura->getCliente() === $this) {
                $factura->setCliente(null);
            }
        }

        return $this;
    }


}
