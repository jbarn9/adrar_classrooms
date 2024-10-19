<?php

namespace App\Entity;

use App\Repository\ChaptersRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\ErrorHandler\Collecting;

#[ORM\Entity(repositoryClass: ChaptersRepository::class)]
class Chapters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $subtitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'chapter')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Courses $course = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $postedAt = null;

    #[ORM\Column]
    private ?bool $posted = null;

    #[ORM\Column]
    private ?bool $finished = null;

    private Collection $chapters;


    public function findAll(): ?Collection
    {
        return $this->chapters;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): static
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCourse(): ?Courses
    {
        return $this->course;
    }

    public function setCourse(?Courses $course): static
    {
        $this->course = $course;

        return $this;
    }


    public function getPostedAt(): ?\DateTimeInterface
    {
        return $this->postedAt;
    }

    public function setPostedAt(?\DateTimeInterface $postedAt): static
    {
        $this->postedAt = $postedAt;

        return $this;
    }

    public function isPosted(): ?bool
    {
        return $this->posted;
    }

    public function setPosted(bool $posted): static
    {
        $this->posted = $posted;

        return $this;
    }

    public function isFinished(): ?bool
    {
        return $this->finished;
    }

    public function setFinished(bool $finished): static
    {
        $this->finished = $finished;

        return $this;
    }
}
