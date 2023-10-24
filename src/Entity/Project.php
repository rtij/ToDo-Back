<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity
 */
class Project
{
    /**
     * @var int
     *
     * @Groups("post:read")
     * @ORM\Column(name="idProject", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproject;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var bool|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = 0;

    /**
     * @var bool|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="repeats", type="boolean", nullable=true)
     */
    private $repeats = 0;

    
    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="iduser")
     * })
     */
    private $iduser;

    
    /**
     *
     * @Groups("post:read")
     * @ORM\OneToMany(targetEntity="Task", mappedBy="idproject", orphanRemoval=true)
     */
    private $idtask;
    
    public function __construct()
    {
        $this->idtask = new ArrayCollection();
    }


    public function getIdproject(): ?int
    {
        return $this->idproject;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function isRepeats(): ?bool
    {
        return $this->repeats;
    }

    public function setRepeats(?bool $issup): self
    {
        $this->repeats = $issup;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getIdtask(): Collection
    {
        return $this->idtask;
    }

    public function removeIdtask(Task $task): self
    {
        if ($this->idtask->contains($task)) {
            $this->idtask->removeElement($task);
            if ($task->getIdproject() === $this) {
                $task->setIdproject(null);
            }
        }
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
