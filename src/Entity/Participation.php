<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $num_equipe = null;

    #[ORM\Column]
    private ?int $resultat = null;

    #[ORM\Column]
    private ?int $cote = null;

    #[ORM\Column]
    private ?bool $is_gagnant = null;

    #[ORM\OneToMany(mappedBy: 'participation', targetEntity: Equipe::class)]
    private Collection $equipes;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partie $partie = null;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isNumEquipe(): ?bool
    {
        return $this->num_equipe;
    }

    public function setNumEquipe(bool $num_equipe): self
    {
        $this->num_equipe = $num_equipe;

        return $this;
    }

    public function getResultat(): ?int
    {
        return $this->resultat;
    }

    public function setResultat(int $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getCote(): ?int
    {
        return $this->cote;
    }

    public function setCote(int $cote): self
    {
        $this->cote = $cote;

        return $this;
    }

    public function isIsGagnant(): ?bool
    {
        return $this->is_gagnant;
    }

    public function setIsGagnant(bool $is_gagnant): self
    {
        $this->is_gagnant = $is_gagnant;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
            $equipe->setParticipation($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getParticipation() === $this) {
                $equipe->setParticipation(null);
            }
        }

        return $this;
    }

    public function getPartie(): ?Partie
    {
        return $this->partie;
    }

    public function setPartie(Partie $partie): self
    {
        $this->partie = $partie;

        return $this;
    }
}
