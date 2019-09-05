<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $QuantitePanier;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DatePanier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantitePanier(): ?int
    {
        return $this->QuantitePanier;
    }

    public function setQuantitePanier(int $QuantitePanier): self
    {
        $this->QuantitePanier = $QuantitePanier;

        return $this;
    }

    public function getDatePanier(): ?\DateTimeInterface
    {
        return $this->DatePanier;
    }

    public function setDatePanier(?\DateTimeInterface $DatePanier): self
    {
        $this->DatePanier = $DatePanier;

        return $this;
    }
}
