<?php

namespace App\Entity;

use App\Repository\CompteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteurRepository::class)
 */
class Compteur
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
    private $numcompteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumcompteur(): ?int
    {
        return $this->numcompteur;
    }

    public function setNumcompteur(int $numcompteur): self
    {
        $this->numcompteur = $numcompteur;

        return $this;
    }
}
