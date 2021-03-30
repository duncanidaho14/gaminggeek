<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity=Jeuxvideo::class, inversedBy="categories")
     */
    private $jeuxvideo;

    public function __construct()
    {
        $this->jeuxvideo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|Jeuxvideo[]
     */
    public function getJeuxvideo(): Collection
    {
        return $this->jeuxvideo;
    }

    public function addJeuxvideo(Jeuxvideo $jeuxvideo): self
    {
        if (!$this->jeuxvideo->contains($jeuxvideo)) {
            $this->jeuxvideo[] = $jeuxvideo;
        }

        return $this;
    }

    public function removeJeuxvideo(Jeuxvideo $jeuxvideo): self
    {
        $this->jeuxvideo->removeElement($jeuxvideo);

        return $this;
    }
}
