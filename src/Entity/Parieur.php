<?php

namespace App\Entity;

use App\Repository\ParieurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'parieurs', targetEntity: Mise::class)]
    private Collection $mises;

    public function __construct()
    {
        $this->mises = new ArrayCollection();
    }

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

    public function getUtilisateur(): ?User
    {
        return $this->user;
    }

    public function setUtilisateur(User $user): self
    {
        $this->user = $user;

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
            $mise->setParieurs($this);
        }

        return $this;
    }

    public function removeMise(Mise $mise): self
    {
        if ($this->mises->removeElement($mise)) {
            // set the owning side to null (unless already changed)
            if ($mise->getParieurs() === $this) {
                $mise->setParieurs(null);
            }
        }

        return $this;
    }
}
