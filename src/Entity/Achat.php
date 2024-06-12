<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 *
 * @ORM\Table(name="Achat")
 * @ORM\Entity
 */
class Achat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateA", type="date", nullable=true, options={"default"="NULL"})
     */
    private $datea = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDatea(): ?\DateTimeInterface
    {
        return $this->datea;
    }

    public function setDatea(?\DateTimeInterface $datee): self
    {
        $this->datea = $datee;

        return $this;
    }
}
