<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projecthisto
 *
 * @ORM\Table(name="projecthisto", indexes={@ORM\Index(name="fk_project_histo", columns={"idProject"})})
 * @ORM\Entity
 */
class Projecthisto
{
    /**
     * @var int
     *
     * @ORM\Column(name="idHisto", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhisto;

    /**
     * @var string
     *
     * @ORM\Column(name="histo", type="string", length=255, nullable=false)
     */
    private $histo;

    /**
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProject", referencedColumnName="idProject")
     * })
     */
    private $idproject;

    public function getIdhisto(): ?int
    {
        return $this->idhisto;
    }

    public function getHisto(): ?string
    {
        return $this->histo;
    }

    public function setHisto(string $histo): self
    {
        $this->histo = $histo;

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
