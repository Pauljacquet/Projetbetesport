<?php

namespace App\Entity;

use App\Repository\PartieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartieRepository::class)]
class Partie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_heure = null;

    #[ORM\ManyToOne(inversedBy: 'parties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tournoi $tournoi = null;

    #[ORM\Column(length: 255)]
    private ?string $cote_equipe_a = null;

    #[ORM\Column(length: 255)]
    private ?string $cote_equipe_b = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->date_heure;
    }

    public function setDateHeure(\DateTimeInterface $date_heure): self
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    public function getTournoi(): ?Tournoi
    {
        return $this->tournoi;
    }

    public function setTournoi(?Tournoi $tournoi): self
    {
        $this->tournoi = $tournoi;

        return $this;
    }

    public function getCoteEquipeA(): ?string
    {
        return $this->cote_equipe_a;
    }

    public function setCoteEquipeA(string $cote_equipe_a): self
    {
        $this->cote_equipe_a = $cote_equipe_a;

        return $this;
    }

    public function getCoteEquipeB(): ?string
    {
        return $this->cote_equipe_b;
    }

    public function setCoteEquipeB(string $cote_equipe_b): self
    {
        $this->cote_equipe_b = $cote_equipe_b;

        return $this;
    }
}
