<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Task
 *
 * @ORM\Table(name="task", indexes={@ORM\Index(name="fk_project_task", columns={"idProject"}), @ORM\Index(name="fk_state_task", columns={"idState"})})
 * @ORM\Entity
 */
class Task
{
    /**
     * @var int
     *
     * @Groups("post:read")
     * @ORM\Column(name="idtask", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtask;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="tasks", type="string", length=255, nullable=false)
     */
    private $tasks;

    /**
     * @var \DateTime|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="dateS", type="date", nullable=true, options={"default"="NULL"})
     */
    private $dates = null;

    /**
     * @var \DateTime|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="dateF", type="date", nullable=true, options={"default"="NULL"})
     */
    private $datef = null;

    /**
     * @var \DateTime|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="dateE", type="date", nullable=true, options={"default"="NULL"})
     */
    private $datee = null;

    /**
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProject", referencedColumnName="idProject")
     * })
     */
    private $idproject;

    /**
     * @var \Taskstate
     *
     * @Groups("post:read")
     * @ORM\ManyToOne(targetEntity="Taskstate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idState", referencedColumnName="idState")
     * })
     */
    private $idstate;
    
    /**
     * @var bool|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="isdone", type="boolean", nullable=true)
     */
    private $isdone = 0;

    public function getIdtask(): ?int
    {
        return $this->idtask;
    }

    public function getTasks(): ?string
    {
        return $this->tasks;
    }

    public function setTasks(string $tasks): self
    {
        $this->tasks = $tasks;

        return $this;
    }

    public function getDates(): ?\DateTimeInterface
    {
        return $this->dates;
    }

    public function setDates(?\DateTimeInterface $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    public function getDatef(): ?\DateTimeInterface
    {
        return $this->datef;
    }

    public function setDatef(?\DateTimeInterface $datef): self
    {
        $this->datef = $datef;

        return $this;
    }

    public function getDatee(): ?\DateTimeInterface
    {
        return $this->datee;
    }

    public function setDatee(?\DateTimeInterface $datee): self
    {
        $this->datee = $datee;

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

    public function getIdstate(): ?Taskstate
    {
        return $this->idstate;
    }

    public function setIdstate(?Taskstate $idstate): self
    {
        $this->idstate = $idstate;

        return $this;
    }

    public function isIsdone(): ?bool
    {
        return $this->isdone;
    }

    public function setIsdone(?bool $issup): self
    {
        $this->isdone = $issup;

        return $this;
    }

}
