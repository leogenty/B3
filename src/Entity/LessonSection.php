<?php

namespace App\Entity;

use App\Repository\LessonSectionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonSectionRepository::class)]
class LessonSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'lessonSections')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lessons $LessonSection = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $textcontent = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    public function __toString()
    {
        return $this->name;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLessonSection(): ?Lessons
    {
        return $this->LessonSection;
    }

    public function setLessonSection(?Lessons $LessonSection): self
    {
        $this->LessonSection = $LessonSection;

        return $this;
    }

    public function getTextcontent(): ?string
    {
        return $this->textcontent;
    }

    public function setTextcontent(?string $textcontent): self
    {
        $this->textcontent = $textcontent;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
