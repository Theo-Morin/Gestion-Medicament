<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedicamentRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(
 * fields={"NomCommercial"},
 * message="Un autre médicament possède déjà ce nom"
 * )
 */
class Medicament
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomCommercial;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $PrixEchantillon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ContreIndication;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Effet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="medicaments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommercial(): ?string
    {
        return $this->NomCommercial;
    }

    public function setNomCommercial(string $NomCommercial): self
    {
        $this->NomCommercial = $NomCommercial;

        return $this;
    }

    public function getPrixEchantillon(): ?string
    {
        return $this->PrixEchantillon;
    }

    public function setPrixEchantillon(string $PrixEchantillon): self
    {
        $this->PrixEchantillon = $PrixEchantillon;

        return $this;
    }

    public function getContreIndication(): ?string
    {
        return $this->ContreIndication;
    }

    public function setContreIndication(string $ContreIndication): self
    {
        $this->ContreIndication = $ContreIndication;

        return $this;
    }

    public function getEffet(): ?string
    {
        return $this->Effet;
    }

    public function setEffet(?string $Effet): self
    {
        $this->Effet = $Effet;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }
}
