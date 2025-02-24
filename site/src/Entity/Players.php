<?php

namespace App\Entity;

use App\Enum\PlayerStatusEnum;
use App\Repository\PlayersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayersRepository::class)]
class Players
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teams $team = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\Column(nullable: true)]
    private ?int $gamesPlayed = null;

    #[ORM\Column(nullable: true)]
    private ?int $gamesStarted = null;

    #[ORM\Column(nullable: true)]
    private ?int $minutesPlayed = null;

    #[ORM\Column(nullable: true)]
    private ?int $fieldGoals = null;

    #[ORM\Column(nullable: true)]
    private ?int $fieldGoalAttempts = null;

    #[ORM\Column(nullable: true)]
    private ?float $fieldGoalPercent = null;

    #[ORM\Column(nullable: true)]
    private ?int $threePointGoals = null;

    #[ORM\Column(nullable: true)]
    private ?int $threePointAttempts = null;

    #[ORM\Column(nullable: true)]
    private ?float $threePointPercent = null;

    #[ORM\Column(nullable: true)]
    private ?int $twoPointGoals = null;

    #[ORM\Column(nullable: true)]
    private ?int $twoPointAttempts = null;

    #[ORM\Column(nullable: true)]
    private ?float $twoPointPercent = null;

    #[ORM\Column(nullable: true)]
    private ?float $effectiveFieldGoalPercent = null;

    #[ORM\Column(nullable: true)]
    private ?int $freeThrowGoals = null;

    #[ORM\Column(nullable: true)]
    private ?int $freeThrowAttempts = null;

    #[ORM\Column(nullable: true)]
    private ?float $freeThrowPercent = null;

    #[ORM\Column(nullable: true)]
    private ?int $offensiveRebounds = null;

    #[ORM\Column(nullable: true)]
    private ?int $defensiveRebounds = null;

    #[ORM\Column(nullable: true)]
    private ?int $totalRebounds = null;

    #[ORM\Column(nullable: true)]
    private ?int $assists = null;

    #[ORM\Column(nullable: true)]
    private ?int $steals = null;

    #[ORM\Column(nullable: true)]
    private ?int $blocks = null;

    #[ORM\Column(nullable: true)]
    private ?int $turnovers = null;

    #[ORM\Column(nullable: true)]
    private ?int $personalFouls = null;

    #[ORM\Column(nullable: true)]
    private ?int $points = null;

    #[ORM\Column(enumType: PlayerStatusEnum::class)]
    private ?PlayerStatusEnum $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreated = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateModified = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeleted = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTeam(): ?Teams
    {
        return $this->team;
    }

    public function setTeam(?Teams $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getGamesPlayed(): ?int
    {
        return $this->gamesPlayed;
    }

    public function setGamesPlayed(?int $gamesPlayed): static
    {
        $this->gamesPlayed = $gamesPlayed;

        return $this;
    }

    public function getGamesStarted(): ?int
    {
        return $this->gamesStarted;
    }

    public function setGamesStarted(?int $gamesStarted): static
    {
        $this->gamesStarted = $gamesStarted;

        return $this;
    }

    public function getMinutesPlayed(): ?int
    {
        return $this->minutesPlayed;
    }

    public function setMinutesPlayed(?int $minutesPlayed): static
    {
        $this->minutesPlayed = $minutesPlayed;

        return $this;
    }

    public function getFieldGoals(): ?int
    {
        return $this->fieldGoals;
    }

    public function setFieldGoals(?int $fieldGoals): static
    {
        $this->fieldGoals = $fieldGoals;

        return $this;
    }

    public function getFieldGoalAttempts(): ?int
    {
        return $this->fieldGoalAttempts;
    }

    public function setFieldGoalAttempts(?int $fieldGoalAttempts): static
    {
        $this->fieldGoalAttempts = $fieldGoalAttempts;

        return $this;
    }

    public function getFieldGoalPercent(): ?float
    {
        return $this->fieldGoalPercent;
    }

    public function setFieldGoalPercent(?float $fieldGoalPercent): static
    {
        $this->fieldGoalPercent = $fieldGoalPercent;

        return $this;
    }

    public function getThreePointGoals(): ?int
    {
        return $this->threePointGoals;
    }

    public function setThreePointGoals(?int $threePointGoals): static
    {
        $this->threePointGoals = $threePointGoals;

        return $this;
    }

    public function getThreePointAttempts(): ?int
    {
        return $this->threePointAttempts;
    }

    public function setThreePointAttempts(?int $threePointAttempts): static
    {
        $this->threePointAttempts = $threePointAttempts;

        return $this;
    }

    public function getThreePointPercent(): ?float
    {
        return $this->threePointPercent;
    }

    public function setThreePointPercent(?float $threePointPercent): static
    {
        $this->threePointPercent = $threePointPercent;

        return $this;
    }

    public function getTwoPointGoals(): ?int
    {
        return $this->twoPointGoals;
    }

    public function setTwoPointGoals(?int $twoPointGoals): static
    {
        $this->twoPointGoals = $twoPointGoals;

        return $this;
    }

    public function getTwoPointAttempts(): ?int
    {
        return $this->twoPointAttempts;
    }

    public function setTwoPointAttempts(?int $twoPointAttempts): static
    {
        $this->twoPointAttempts = $twoPointAttempts;

        return $this;
    }

    public function getTwoPointPercent(): ?float
    {
        return $this->twoPointPercent;
    }

    public function setTwoPointPercent(?float $twoPointPercent): static
    {
        $this->twoPointPercent = $twoPointPercent;

        return $this;
    }

    public function getEffectiveFieldGoalPercent(): ?float
    {
        return $this->effectiveFieldGoalPercent;
    }

    public function setEffectiveFieldGoalPercent(?float $effectiveFieldGoalPercent): static
    {
        $this->effectiveFieldGoalPercent = $effectiveFieldGoalPercent;

        return $this;
    }

    public function getFreeThrowGoals(): ?int
    {
        return $this->freeThrowGoals;
    }

    public function setFreeThrowGoals(?int $freeThrowGoals): static
    {
        $this->freeThrowGoals = $freeThrowGoals;

        return $this;
    }

    public function getFreeThrowAttempts(): ?int
    {
        return $this->freeThrowAttempts;
    }

    public function setFreeThrowAttempts(?int $freeThrowAttempts): static
    {
        $this->freeThrowAttempts = $freeThrowAttempts;

        return $this;
    }

    public function getFreeThrowPercent(): ?float
    {
        return $this->freeThrowPercent;
    }

    public function setFreeThrowPercent(?float $freeThrowPercent): static
    {
        $this->freeThrowPercent = $freeThrowPercent;

        return $this;
    }

    public function getOffensiveRebounds(): ?int
    {
        return $this->offensiveRebounds;
    }

    public function setOffensiveRebounds(?int $offensiveRebounds): static
    {
        $this->offensiveRebounds = $offensiveRebounds;

        return $this;
    }

    public function getDefensiveRebounds(): ?int
    {
        return $this->defensiveRebounds;
    }

    public function setDefensiveRebounds(?int $defensiveRebounds): static
    {
        $this->defensiveRebounds = $defensiveRebounds;

        return $this;
    }

    public function getTotalRebounds(): ?int
    {
        return $this->totalRebounds;
    }

    public function setTotalRebounds(?int $totalRebounds): static
    {
        $this->totalRebounds = $totalRebounds;

        return $this;
    }

    public function getAssists(): ?int
    {
        return $this->assists;
    }

    public function setAssists(?int $assists): static
    {
        $this->assists = $assists;

        return $this;
    }

    public function getSteals(): ?int
    {
        return $this->steals;
    }

    public function setSteals(?int $steals): static
    {
        $this->steals = $steals;

        return $this;
    }

    public function getBlocks(): ?int
    {
        return $this->blocks;
    }

    public function setBlocks(?int $blocks): static
    {
        $this->blocks = $blocks;

        return $this;
    }

    public function getTurnovers(): ?int
    {
        return $this->turnovers;
    }

    public function setTurnovers(?int $turnovers): static
    {
        $this->turnovers = $turnovers;

        return $this;
    }

    public function getPersonalFouls(): ?int
    {
        return $this->personalFouls;
    }

    public function setPersonalFouls(?int $personalFouls): static
    {
        $this->personalFouls = $personalFouls;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getStatus(): ?PlayerStatusEnum
    {
        return $this->status;
    }

    public function setStatus(PlayerStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(?\DateTimeInterface $dateModified): static
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeInterface
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeInterface $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }
}
