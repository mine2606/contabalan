<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa extends User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;   

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Operacion", mappedBy="empresa")
     */
    private $operaciones;

    
    

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Producto", mappedBy="empresa")
     */
    private $productos;

    public function __construct()
    {
        $this->operaciones = new ArrayCollection();
        $this->productos = new ArrayCollection();
        $this->roles = array('ROLE_EMPRESA');
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
        $this->ficheros = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

   

    /**
     * @return Collection|Operacion[]
     */
    public function getOperaciones(): Collection
    {
        return $this->operaciones;
    }

    public function addOperacione(Operacion $operacione): self
    {
        if (!$this->operaciones->contains($operacione)) {
            $this->operaciones[] = $operacione;
            $operacione->setEmpresa($this);
        }

        return $this;
    }

    public function removeOperacione(Operacion $operacione): self
    {
        if ($this->operaciones->contains($operacione)) {
            $this->operaciones->removeElement($operacione);
            // set the owning side to null (unless already changed)
            if ($operacione->getEmpresa() === $this) {
                $operacione->setEmpresa(null);
            }
        }

        return $this;
    }   

    

    /**
     * @return Collection|Producto[]
     */
    public function getProductos(): Collection
    {
        return $this->productos;
    }

    public function addProducto(Producto $producto): self
    {
        if (!$this->productos->contains($producto)) {
            $this->productos[] = $producto;
            $producto->setEmpresa($this);
        }

        return $this;
    }

    public function removeProducto(Producto $producto): self
    {
        if ($this->productos->contains($producto)) {
            $this->productos->removeElement($producto);
            // set the owning side to null (unless already changed)
            if ($producto->getEmpresa() === $this) {
                $producto->setEmpresa(null);
            }
        }

        return $this;
    }
}
