<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FamilleRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(
 * fields={"NomFamille"},
 * message="Une autre famille possède deja ce nom"
 * )
 */

class Famille
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=255,minMessage="Le nom de la famille doit faire plus de 2 caractères",maxMessage="Le nom de la famille ne doit pas depasser plus de 255 caractères")
     */
    private $NomFamille;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Medicament", mappedBy="famille", orphanRemoval=true)
     */
    private $medicaments;

    public function __construct()
    {
        $this->medicaments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFamille(): ?string
    {
        return $this->NomFamille;
    }

    public function setNomFamille(string $NomFamille): self
    {
        $this->NomFamille = $NomFamille;

        return $this;
    }

    /**
     * @return Collection|Medicament[]
     */
    public function getMedicaments(): Collection
    {
        return $this->medicaments;
    }

    public function addMedicament(Medicament $medicament): self
    {
        if (!$this->medicaments->contains($medicament)) {
            $this->medicaments[] = $medicament;
            $medicament->setFamille($this);
        }

        return $this;
    }

    public function removeMedicament(Medicament $medicament): self
    {
        if ($this->medicaments->contains($medicament)) {
            $this->medicaments->removeElement($medicament);
            // set the owning side to null (unless already changed)
            if ($medicament->getFamille() === $this) {
                $medicament->setFamille(null);
            }
        }

        return $this;
    }
}
