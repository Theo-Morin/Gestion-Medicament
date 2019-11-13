<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComposerRepository")
 */
class Composer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medicament", inversedBy="lesComposers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medicament;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Composant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $composant;

    /**
     * @ORM\Column(type="float")
     */
    private $quantite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicament(): ?Medicament
    {
        return $this->medicament;
    }

    public function setMedicament(?Medicament $medicament): self
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getComposant(): ?Composant
    {
        return $this->composant;
    }

    public function setComposant(?Composant $composant): self
    {
        $this->composant = $composant;

        return $this;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
