<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Authtoken
 *
 * @ORM\Table(name="authtoken")
 * @ORM\Entity
 */
class Authtoken
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtoken", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtoken;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateT", type="date", nullable=false)
     */
    private $datet;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="iduser")
     * })
     */
    private $iduser;

    public function getIdtoken(): ?int
    {
        return $this->idtoken;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getDatet(): ?\DateTimeInterface
    {
        return $this->datet;
    }

    public function setDatet(\DateTimeInterface $datet): self
    {
        $this->datet = $datet;

        return $this;
    }

    public function getIduser(): ?User
    {
        return $this->iduser;
    }

    public function setIduser(?User $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }


}
