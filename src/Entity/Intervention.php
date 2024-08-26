<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRepository::class)]
class Intervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $Maintenance_preventive = null;

    #[ORM\Column]
    private ?bool $Maintenance_corrective = null;

    #[ORM\Column]
    private ?bool $Maintenance_systematique = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Date = null;

   
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isMaintenancePreventive(): ?bool
    {
        return $this->Maintenance_preventive;
    }

    public function setMaintenancePreventive(bool $Maintenance_preventive): static
    {
        $this->Maintenance_preventive = $Maintenance_preventive;

        return $this;
    }

    public function isMaintenanceCorrective(): ?bool
    {
        return $this->Maintenance_corrective;
    }

    public function setMaintenanceCorrective(bool $Maintenance_corrective): static
    {
        $this->Maintenance_corrective = $Maintenance_corrective;

        return $this;
    }

    public function isMaintenanceSystematique(): ?bool
    {
        return $this->Maintenance_systematique;
    }

    public function setMaintenanceSystematique(bool $Maintenance_systematique): static
    {
        $this->Maintenance_systematique = $Maintenance_systematique;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(?\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
