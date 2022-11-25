<?php

namespace App\Entity;

use App\Repository\LessonsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonsRepository::class)]
class Lessons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Desciption = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\ManyToOne(inversedBy: 'lessons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Matter $Matter = null;

    #[ORM\OneToMany(mappedBy: 'LessonSection', targetEntity: LessonSection::class)]
    private Collection $lessonSections;

    public function __construct()
    {
        $this->lessonSections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDesciption(): ?string
    {
        return $this->Desciption;
    }

    public function setDesciption(string $Desciption): self
    {
        $this->Desciption = $Desciption;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getMatter(): ?Matter
    {
        return $this->Matter;
    }

    public function setMatter(?Matter $Matter): self
    {
        $this->Matter = $Matter;

        return $this;
    }

    /**
     * @return Collection<int, LessonSection>
     */
    public function getLessonSections(): Collection
    {
        return $this->lessonSections;
    }

    public function addLessonSection(LessonSection $lessonSection): self
    {
        if (!$this->lessonSections->contains($lessonSection)) {
            $this->lessonSections->add($lessonSection);
            $lessonSection->setLessonSection($this);
        }

        return $this;
    }

    public function removeLessonSection(LessonSection $lessonSection): self
    {
        if ($this->lessonSections->removeElement($lessonSection)) {
            // set the owning side to null (unless already changed)
            if ($lessonSection->getLessonSection() === $this) {
                $lessonSection->setLessonSection(null);
            }
        }

        return $this;
    }
}
