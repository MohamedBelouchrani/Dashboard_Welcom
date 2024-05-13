<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $raisonSocial = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $secteurActivite = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(length: 255)]
    private ?string $urlAcces = null;

    #[ORM\Column(length: 255)]
    private ?string $couleurs = null;

    #[ORM\Column(length: 255)]
    private ?string $gamme = null;

    #[ORM\Column(length: 255)]
    private ?string $bio = null;

    #[ORM\Column(length: 255)]
    private ?string $background = null;

    #[ORM\ManyToOne(inversedBy: 'client')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(string $raisonSocial): static
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSecteurActivite(): ?string
    {
        return $this->secteurActivite;
    }

    public function setSecteurActivite(string $secteurActivite): static
    {
        $this->secteurActivite = $secteurActivite;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getUrlAcces(): ?string
    {
        return $this->urlAcces;
    }

    public function setURLacces(string $urlAcces): static
    {
        $this->urlAcces = $urlAcces;

        return $this;
    }

    public function getCouleurs(): ?string
    {
        return $this->couleurs;
    }

    public function setCouleurs(string $couleurs): static
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    public function getGamme(): ?string
    {
        return $this->gamme;
    }

    public function setGamme(string $gamme): static
    {
        $this->gamme = $gamme;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(string $background): static
    {
        $this->background = $background;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
