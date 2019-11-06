<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FamilleRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(
 * fields={"NomFamille"},
 * message="Une autre famille posséde deja ce nom"
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
     * @Assert\Length(min=2,max=255,minMessage="Le nom de la famille doit faire plus de 2 caractéres",maxMessage="Le nom de la famille ne doit pas depasser plus de 255 caractéres")
     */
    private $NomFamille;

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
}
