<?php

namespace App\Entity;

use App\Repository\TournoiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TournoiRepository::class)]
class Tournoi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $nb_equipes = null;

    #[ORM\ManyToOne(inversedBy: 'tournois')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'tournois')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Jeu $jeu = null;

    #[ORM\OneToMany(mappedBy: 'tournoi', targetEntity: Partie::class)]
    private Collection $parties;

    #[ORM\ManyToMany(targetEntity: Equipe::class, mappedBy: 'Tournoi')]
    private Collection $Equipes;

    public function __construct()
    {
        $this->parties = new ArrayCollection();
        $this->Equipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
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

    public function getUtilisateur(): ?User
    {
        return $this->user;
    }

    public function setUtilisateur(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getJeu(): ?Jeu
    {
        return $this->jeu;
    }

    public function setJeu(?Jeu $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
    }

    /**
     * @return Collection<int, Partie>
     */
    public function getParties(): Collection
    {
        return $this->parties;
    }

    public function addParty(Partie $party): self
    {
        if (!$this->parties->contains($party)) {
            $this->parties->add($party);
            $party->setTournoi($this);
        }

        return $this;
    }

    public function removeParty(Partie $party): self
    {
        if ($this->parties->removeElement($party)) {
            // set the owning side to null (unless already changed)
            if ($party->getTournoi() === $this) {
                $party->setTournoi(null);
            }
        }

        return $this;
    }

    public function getNbEquipes(): ?int
    {
        return $this->nb_equipes;
    }

    public function setNbEquipes(int $nb_equipes): self
    {
        $this->nb_equipes = $nb_equipes;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->Equipes;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->Equipes->contains($equipe)) {
            $this->Equipes->add($equipe);
            $equipe->setTournoi($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        if ($this->Equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getTournoi() === $this) {
                $equipe->setTournoi(null);
            }
        }

        return $this;
    }
}
