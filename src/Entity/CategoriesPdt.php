<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesPdtRepository")
 */
class CategoriesPdt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LibelleCat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="categoriesPdt")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Atelier", mappedBy="categorie")
     */
    private $ateliers;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->ateliers = new ArrayCollection();
    }




    //________________________________________________________________________
    //ID
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCat(): ?string
    {
        return $this->LibelleCat;
    }

    public function setLibelleCat(?string $LibelleCat): self
    {
        $this->LibelleCat = $LibelleCat;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategoriesPdt($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getCategoriesPdt() === $this) {
                $product->setCategoriesPdt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Atelier[]
     */
    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    public function addAtelier(Atelier $atelier): self
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers[] = $atelier;
            $atelier->setCategorie($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): self
    {
        if ($this->ateliers->contains($atelier)) {
            $this->ateliers->removeElement($atelier);
            // set the owning side to null (unless already changed)
            if ($atelier->getCategorie() === $this) {
                $atelier->setCategorie(null);
            }
        }

        return $this;
    }







}
