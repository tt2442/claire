<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * PARTIE=admin
     * EXTEND=admin.html.twig
     * ATTR=no_index
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\OneToMany(targetEntity=Reseausocial::class, mappedBy="contact")
     */
    private $reseau;

    public function __construct()
    {
        $this->reseau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection|Reseausocial[]
     */
    public function getReseau(): Collection
    {
        return $this->reseau;
    }

    public function addReseau(Reseausocial $reseau): self
    {
        if (!$this->reseau->contains($reseau)) {
            $this->reseau[] = $reseau;
            $reseau->setContact($this);
        }

        return $this;
    }

    public function removeReseau(Reseausocial $reseau): self
    {
        if ($this->reseau->removeElement($reseau)) {
            // set the owning side to null (unless already changed)
            if ($reseau->getContact() === $this) {
                $reseau->setContact(null);
            }
        }

        return $this;
    }
}
