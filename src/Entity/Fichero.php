<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="fichero")
* @ORM\HasLifecycleCallbacks
*/
class Fichero
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nombrecodificado;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $size;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechahora;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="ficheros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNombrecodificado(): ?string
    {
        return $this->nombrecodificado;
    }

    public function setNombrecodificado(string $nombrecodificado): self
    {
        $this->nombrecodificado = $nombrecodificado;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getFechahora(): ?\DateTimeInterface
    {
        return $this->fechahora;
    }

    public function setFechahora(\DateTimeInterface $fechahora): self
    {
        $this->fechahora = $fechahora;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
