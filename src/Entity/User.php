<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @Groups("post:read")
     * @ORM\Column(name="iduser", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var bool|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="usedark", type="boolean", nullable=true)
     */
    private $usedark = 0;
    
    /**
     * @var bool|null
     *
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = 0;

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function isUsedark(): ?bool
    {
        return $this->usedark;
    }

    public function setUsedark(?bool $usedark): self
    {
        $this->usedark = $usedark;

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


    public function getRoles()
    {
        return [];
    }
    public function getUserIdentifier()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }
    public function getSalt()
    {
        return;
    }


}
