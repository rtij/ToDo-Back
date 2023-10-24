<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Taskstate
 *
 * @ORM\Table(name="taskstate")
 * @ORM\Entity
 */
class Taskstate
{
    /**
     * @var int
     *
     * @Groups("post:read")
     * @ORM\Column(name="idState", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstate;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="states", type="string", length=255, nullable=false)
     */
    private $states;

    /**
     * @var bool|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = 0;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="color", type="string", length=255, nullable=false)
     */
    private $color;

    public function getIdstate(): ?int
    {
        return $this->idstate;
    }

    public function getStates(): ?string
    {
        return $this->states;
    }

    public function setStates(string $states): self
    {
        $this->states = $states;

        return $this;
    }

    public function isIssup(): ?bool
    {
        return $this->issup;
    }

    public function setIssup(?bool $issup): self
    {
        $this->issup = $issup;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }


}
