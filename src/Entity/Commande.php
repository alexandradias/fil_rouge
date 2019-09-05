<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateCommande;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $TotalHtCommande;

    /**
     * @ORM\Column(type="integer")
     */
    private $TotalTtcCommande;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SuiviCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->DateCommande;
    }

    public function setDateCommande(\DateTimeInterface $DateCommande): self
    {
        $this->DateCommande = $DateCommande;

        return $this;
    }

    public function getTotalHtCommande(): ?int
    {
        return $this->TotalHtCommande;
    }

    public function setTotalHtCommande(?int $TotalHtCommande): self
    {
        $this->TotalHtCommande = $TotalHtCommande;

        return $this;
    }

    public function getTotalTtcCommande(): ?int
    {
        return $this->TotalTtcCommande;
    }

    public function setTotalTtcCommande(int $TotalTtcCommande): self
    {
        $this->TotalTtcCommande = $TotalTtcCommande;

        return $this;
    }

    public function getSuiviCommande(): ?string
    {
        return $this->SuiviCommande;
    }

    public function setSuiviCommande(?string $SuiviCommande): self
    {
        $this->SuiviCommande = $SuiviCommande;

        return $this;
    }
}
