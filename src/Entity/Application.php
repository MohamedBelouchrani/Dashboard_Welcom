<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lienApplication = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLienApplication(): ?string
    {
        return $this->lienApplication;
    }

    public function setLienApplication(string $lienApplication): static
    {
        $this->lienApplication = $lienApplication;

        return $this;
    }
}
