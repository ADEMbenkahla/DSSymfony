<?php

namespace App\Entity;

use App\Repository\TheatrePlayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TheatrePlayRepository::class)]
class TheatrePlay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Genre = null;

    #[ORM\Column(length: 255)]
    private ?string $Duration = null;

    /**
     * @var Collection<int, Show>
     */
    #[ORM\OneToMany(targetEntity: Show::class, mappedBy: 'theatrePlay',cascade:["remove"],orphanRemoval:true)]
    private Collection $shows;

    public function __construct()
    {
        $this->shows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): static
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->Duration;
    }

    public function setDuration(string $Duration): static
    {
        $this->Duration = $Duration;

        return $this;
    }

    /**
     * @return Collection<int, Show>
     */
    public function getShows(): Collection
    {
        return $this->shows;
    }

    public function addShow(Show $show): static
    {
        if (!$this->shows->contains($show)) {
            $this->shows->add($show);
            $show->setTheatrePlay($this);
        }

        return $this;
    }

    public function removeShow(Show $show): static
    {
        if ($this->shows->removeElement($show)) {
            // set the owning side to null (unless already changed)
            if ($show->getTheatrePlay() === $this) {
                $show->setTheatrePlay(null);
            }
        }

        return $this;
    }

public function __toString(): string
{
    return $this->Title;
}

}
