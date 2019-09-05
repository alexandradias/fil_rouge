<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AtelierRepository")
 */
class Atelier
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
    private $NomTypeAtelier;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $DateAtelier;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NombreParticipantAtelier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoriesPdt", inversedBy="ateliers")
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tarifTtcAtelier;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionAtelier;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionShortAtelier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeAtelier(): ?string
    {
        return $this->NomTypeAtelier;
    }

    public function setNomTypeAtelier(string $NomTypeAtelier): self
    {
        $this->NomTypeAtelier = $NomTypeAtelier;

        return $this;
    }

    public function getDateAtelier(): ?int
    {
        return $this->DateAtelier;
    }

    public function setDateAtelier(?int $DateAtelier): self
    {
        $this->DateAtelier = $DateAtelier;

        return $this;
    }

    public function getNombreParticipantAtelier(): ?int
    {
        return $this->NombreParticipantAtelier;
    }

    public function setNombreParticipantAtelier(?int $NombreParticipantAtelier): self
    {
        $this->NombreParticipantAtelier = $NombreParticipantAtelier;

        return $this;
    }

    public function getCategorie(): ?CategoriesPdt
    {
        return $this->categorie;
    }

    public function setCategorie(?CategoriesPdt $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTarifTtcAtelier(): ?int
    {
        return $this->tarifTtcAtelier;
    }

    public function setTarifTtcAtelier(?int $tarifTtcAtelier): self
    {
        $this->tarifTtcAtelier = $tarifTtcAtelier;

        return $this;
    }

    public function getDescriptionAtelier(): ?string
    {
        return $this->descriptionAtelier;
    }

    public function setDescriptionAtelier(?string $descriptionAtelier): self
    {
        $this->descriptionAtelier = $descriptionAtelier;

        return $this;
    }

    public function getDescriptionShortAtelier(): ?string
    {
        return $this->descriptionShortAtelier;
    }

    public function setDescriptionShortAtelier(?string $descriptionShortAtelier): self
    {
        $this->descriptionShortAtelier = $descriptionShortAtelier;

        return $this;
    }
}
