<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedicamantRepository")
 */
class Medicamant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
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
     * @ORM\Column(type="string", length=255)
     */
    private $Effet;

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

    public function setEffet(string $Effet): self
    {
        $this->Effet = $Effet;

        return $this;
    }
}
