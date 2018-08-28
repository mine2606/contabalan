<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IvaRepository")
 */
class Iva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $porcentaje;

    public function getId()
    {
        return $this->id;
    }

    public function getPorcentaje(): ?string
    {
        return $this->porcentaje;
    }

    public function setPorcentaje(string $porcentaje): self
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }
}
