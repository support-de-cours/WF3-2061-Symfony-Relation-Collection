<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $score_a = null;

    #[ORM\Column]
    private ?int $score_b = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $team_a = null;

    #[ORM\ManyToOne(inversedBy: 'games_b')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $team_b = null;









    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getScoreA(): ?int
    {
        return $this->score_a;
    }

    public function setScoreA(int $score_a): self
    {
        $this->score_a = $score_a;

        return $this;
    }

    public function getScoreB(): ?int
    {
        return $this->score_b;
    }

    public function setScoreB(int $score_b): self
    {
        $this->score_b = $score_b;

        return $this;
    }

    public function getTeamA(): ?Team
    {
        return $this->team_a;
    }

    public function setTeamA(?Team $team_a): self
    {
        $this->team_a = $team_a;

        return $this;
    }

    public function getTeamB(): ?Team
    {
        return $this->team_b;
    }

    public function setTeamB(?Team $team_b): self
    {
        $this->team_b = $team_b;

        return $this;
    }
}
