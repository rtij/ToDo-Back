<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projectstate
 *
 * @ORM\Table(name="projectstate", indexes={@ORM\Index(name="fk_projectState_project", columns={"idProject"}), @ORM\Index(name="fk_projectState_state", columns={"idState"})})
 * @ORM\Entity
 */
class Projectstate
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProjectState", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprojectstate;

    /**
     * @var \Taskstate
     *
     * @ORM\ManyToOne(targetEntity="Taskstate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idState", referencedColumnName="idState")
     * })
     */
    private $idstate;

    /**
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProject", referencedColumnName="idProject")
     * })
     */
    private $idproject;

    public function getIdprojectstate(): ?int
    {
        return $this->idprojectstate;
    }

    public function getIdstate(): ?Taskstate
    {
        return $this->idstate;
    }

    public function setIdstate(?Taskstate $idstate): self
    {
        $this->idstate = $idstate;

        return $this;
    }

    public function getIdproject(): ?Project
    {
        return $this->idproject;
    }

    public function setIdproject(?Project $idproject): self
    {
        $this->idproject = $idproject;

        return $this;
    }


}
