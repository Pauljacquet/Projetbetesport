<?php

namespace App\Entity;

use App\Repository\MiseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MiseRepository::class)]
class Mise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column]
    private ?int $gain = null;

    #[ORM\ManyToOne(inversedBy: 'mises')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Parieur $parieurs = null;

    #[ORM\ManyToOne(inversedBy: 'mises')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partie $partie = null;

    #[ORM\ManyToOne(inversedBy: 'mises')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getGain(): ?int
    {
        return $this->gain;
    }

    public function setGain(int $gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    public function getParieurs(): ?Parieur
    {
        return $this->parieurs;
    }

    public function setParieurs(?Parieur $parieurs): self
    {
        $this->parieurs = $parieurs;

        return $this;
    }

    public function getPartie(): ?Partie
    {
        return $this->partie;
    }

    public function setPartie(?Partie $partie): self
    {
        $this->partie = $partie;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }
}
