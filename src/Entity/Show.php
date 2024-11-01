<?php

namespace App\Entity;

use App\Repository\ShowRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShowRepository::class)]
#[ORM\Table(name: 'theatre_show')]
class Show
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $numShow = null;

    #[ORM\Column]
    private ?int $Nbrsrat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Dateshow = null;

    #[ORM\ManyToOne(inversedBy: 'shows')]
    private ?TheatrePlay $theatrePlay = null;

    public function getNumShow(): ?int
    {
        return $this->numShow;
    }

    public function setNumShow(int $numShow): static
    {
        $this->numShow = $numShow;

        return $this;
    }

    public function getNbrsrat(): ?int
    {
        return $this->Nbrsrat;
    }

    public function setNbrsrat(int $Nbrsrat): static
    {
        $this->Nbrsrat = $Nbrsrat;

        return $this;
    }

    public function getDateshow(): ?\DateTimeInterface
    {
        return $this->Dateshow;
    }

    public function setDateshow(\DateTimeInterface $Dateshow): static
    {
        $this->Dateshow = $Dateshow;

        return $this;
    }

    public function getTheatrePlay(): ?TheatrePlay
    {
        return $this->theatrePlay;
    }

    public function setTheatrePlay(?TheatrePlay $theatrePlay): static
    {
        $this->theatrePlay = $theatrePlay;

        return $this;
    }
}
