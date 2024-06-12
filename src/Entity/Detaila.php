<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detaila
 *
 * @ORM\Table(name="Detaila")
 * @ORM\Entity
 */
class Detaila
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
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;

    /**
     * @var \Achat
     *
     * @ORM\ManyToOne(targetEntity="Achat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idachat", referencedColumnName="id")
     * })
     */
    private $idachat;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproduit", referencedColumnName="id")
     * })
     */
    private $idproduit;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $name): self
    {
        $this->nombre = $name;

        return $this;
    }

    public function getIdachat(): ?Achat
    {
        return $this->idachat;
    }

    public function setIdachat(?Achat $idproject): self
    {
        $this->idachat = $idproject;

        return $this;
    }

    public function getIdproduit(): ?Produit
    {
        return $this->idproduit;
    }

    public function setIdproduit(?Produit $idproject): self
    {
        $this->idproduit = $idproject;

        return $this;
    }
}
