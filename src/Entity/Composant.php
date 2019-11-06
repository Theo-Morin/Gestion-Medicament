<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComposantRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(
 * fields={"NomComposant"},
 * message="Un autre Composant posséde deja ce nom"
 * )
 */
class Composant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=255,minMessage="Le nom du composant doit faire plus de 2 caractéres",maxMessage="Le nom du composant ne doit pas depasser plus de 255 caractéres")
     */
    private $NomComposant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComposant(): ?string
    {
        return $this->NomComposant;
    }

    public function setNomComposant(string $NomComposant): self
    {
        $this->NomComposant = $NomComposant;

        return $this;
    }
}
