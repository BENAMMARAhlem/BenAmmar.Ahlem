<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
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
     * @ORM\Column(type="integer")
     */
    private $numcom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateComm;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_Client;

    /**
     * @ORM\Column(type="float")
     */
    private $TotalTax;

    /**
     * @ORM\Column(type="float")
     */
    private $TotalTva;

    /**
     * @ORM\Column(type="float")
     */
    private $TotalTtc;

    /**
     * @ORM\OneToMany(targetEntity=Lcommande::class, mappedBy="id_commande")
     */
    private $id_produit;

    public function __construct()
    {
        $this->id_produit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumcom(): ?int
    {
        return $this->numcom;
    }

    public function setNumcom(?int $numcom): self
    {
        $this->numcom = $numcom;

        return $this;
    }

    public function getDateComm(): ?\DateTimeInterface
    {
        return $this->dateComm;
    }

    public function setDateComm(\DateTimeInterface $dateComm): self
    {
        $this->dateComm = $dateComm;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->id_Client;
    }

    public function setIdClient(?Client $id_Client): self
    {
        $this->id_Client = $id_Client;

        return $this;
    }

    public function getTotalTax(): ?float
    {
        return $this->TotalTax;
    }

    public function setTotalTax(float $TotalTax): self
    {
        $this->TotalTax = $TotalTax;

        return $this;
    }

    public function getTotalTva(): ?float
    {
        return $this->TotalTva;
    }

    public function setTotalTva(float $TotalTva): self
    {
        $this->TotalTva = $TotalTva;

        return $this;
    }

    public function getTotalTtc(): ?float
    {
        return $this->TotalTtc;
    }

    public function setTotalTtc(float $TotalTtc): self
    {
        $this->TotalTtc = $TotalTtc;

        return $this;
    }

    /**
     * @return Collection|Lcommande[]
     */
    public function getIdProduit(): Collection
    {
        return $this->id_produit;
    }

    public function addIdProduit(Lcommande $idProduit): self
    {
        if (!$this->id_produit->contains($idProduit)) {
            $this->id_produit[] = $idProduit;
            $idProduit->setIdCommande($this);
        }

        return $this;
    }

    public function removeIdProduit(Lcommande $idProduit): self
    {
        if ($this->id_produit->contains($idProduit)) {
            $this->id_produit->removeElement($idProduit);
            // set the owning side to null (unless already changed)
            if ($idProduit->getIdCommande() === $this) {
                $idProduit->setIdCommande(null);
            }
        }

        return $this;
    }

}
