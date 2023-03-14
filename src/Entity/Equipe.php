<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_equipe = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tournoi $tournoi = null;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Participation $participation = null;

    #[ORM\OneToMany(mappedBy: 'equipe', targetEntity: Mise::class)]
    private Collection $mises;

    public function __construct()
    {
        $this->mises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->nom_equipe;
    }

    public function setNomEquipe(string $nom_equipe): self
    {
        $this->nom_equipe = $nom_equipe;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

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

    public function getParticipation(): ?Participation
    {
        return $this->participation;
    }

    public function setParticipation(?Participation $participation): self
    {
        $this->participation = $participation;

        return $this;
    }

    /**
     * @return Collection<int, Mise>
     */
    public function getMises(): Collection
    {
        return $this->mises;
    }

    public function addMise(Mise $mise): self
    {
        if (!$this->mises->contains($mise)) {
            $this->mises->add($mise);
            $mise->setEquipe($this);
        }

        return $this;
    }

    public function removeMise(Mise $mise): self
    {
        if ($this->mises->removeElement($mise)) {
            // set the owning side to null (unless already changed)
            if ($mise->getEquipe() === $this) {
                $mise->setEquipe(null);
            }
        }

        return $this;
    }
}
