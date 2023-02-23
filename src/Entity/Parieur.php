<?php

namespace App\Entity;

use App\Repository\ParieurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParieurRepository::class)]
class Parieur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?int $banque = null;

    #[ORM\OneToOne(inversedBy: 'parieur', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?utilisateur $Utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getBanque(): ?int
    {
        return $this->banque;
    }

    public function setBanque(int $banque): self
    {
        $this->banque = $banque;

        return $this;
    }

    public function getUtilisateur(): ?utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(utilisateur $Utilisateur): self
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }
}
