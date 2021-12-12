<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime",  nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    private $created_At;

    /**
     * @ORM\Column(type="datetime",  nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updated_At;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity=Fournisseur::class, mappedBy="produits")
     */
    private $fournisseurs;

    public function __construct()
    {
        $this->fournisseurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_At;
    }

    public function setCreatedAt(\DateTimeInterface $created_At): self
    {
        $this->created_At = $created_At;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_At;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_At): self
    {
        $this->updated_At = $updated_At;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Fournisseur[]
     */
    public function getFournisseurs(): Collection
    {
        return $this->fournisseurs;
    }

    public function addFournisseur(Fournisseur $fournisseur): self
    {
        if (!$this->fournisseurs->contains($fournisseur)) {
            $this->fournisseurs[] = $fournisseur;
            $fournisseur->addProduit($this);
        }

        return $this;
    }

    public function removeFournisseur(Fournisseur $fournisseur): self
    {
        if ($this->fournisseurs->removeElement($fournisseur)) {
            $fournisseur->removeProduit($this);
        }

        return $this;
    }
}
