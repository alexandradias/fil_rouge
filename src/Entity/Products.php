<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
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
    private $NomPdt;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $DescriptionPdt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PhotoPdt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $TarifsHtPdt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $TvaPdt;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $TarifsTtcPdt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoriesPdt", inversedBy="products")
     */
    private $categoriesPdt;

    //________________________________________________________________________
    //cree un champs pour intégrer mes images
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $compositionPdt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionShortPdt;

    //________________________________________________________________________
    //ID
    public function getId(): ?int
    {
        return $this->id;
    }

    //________________________________________________________________________
    //getter et setter image add
    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }
    //________________________________________________________________________
    //getter et setter image add

    public function getNomPdt(): ?string
    {
        return $this->NomPdt;
    }

    public function setNomPdt(string $NomPdt): self
    {
        $this->NomPdt = $NomPdt;

        return $this;
    }

    public function getDescriptionPdt(): ?string
    {
        return $this->DescriptionPdt;
    }

    public function setDescriptionPdt(string $DescriptionPdt): self
    {
        $this->DescriptionPdt = $DescriptionPdt;

        return $this;
    }

    public function getPhotoPdt(): ?string
    {
        return $this->PhotoPdt;
    }

    public function setPhotoPdt(string $PhotoPdt): self
    {
        $this->PhotoPdt = $PhotoPdt;

        return $this;
    }

    public function getTarifsHtPdt(): ?int
    {
        return $this->TarifsHtPdt;
    }

    public function setTarifsHtPdt(?int $TarifsHtPdt): self
    {
        $this->TarifsHtPdt = $TarifsHtPdt;

        return $this;
    }

    public function getTvaPdt(): ?int
    {
        return $this->TvaPdt;
    }

    public function setTvaPdt(?int $TvaPdt): self
    {
        $this->TvaPdt = $TvaPdt;

        return $this;
    }

    public function getTarifsTtcPdt(): ?string
    {
        return $this->TarifsTtcPdt;
    }

    public function setTarifsTtcPdt(string $TarifsTtcPdt): self
    {
        $this->TarifsTtcPdt = $TarifsTtcPdt;

        return $this;
    }

    public function getCategoriesPdt(): ?CategoriesPdt
    {
        return $this->categoriesPdt;
    }

    public function setCategoriesPdt(?CategoriesPdt $categoriesPdt): self
    {
        $this->categoriesPdt = $categoriesPdt;

        return $this;
    }


    //________________________________________________________________________
    //getter et setter composition & description courte

    public function getCompositionPdt(): ?string
    {
        return $this->compositionPdt;
    }

    public function setCompositionPdt(?string $compositionPdt): self
    {
        $this->compositionPdt = $compositionPdt;

        return $this;
    }

    public function getDescriptionShortPdt(): ?string
    {
        return $this->descriptionShortPdt;
    }

    public function setDescriptionShortPdt(?string $descriptionShortPdt): self
    {
        $this->descriptionShortPdt = $descriptionShortPdt;

        return $this;
    }






}
