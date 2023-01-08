<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class ShortenedUrl
{
    #[ORM\Id]
    #[ORM\Column('id', 'bigint')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column('identifier', 'string', nullable: false, unique: true)]
    private string $identifier;

    #[ORM\Column('target', 'string', nullable: false)]
    private string $target;

    #[ORM\Column('is_admin', 'boolean')]
    private bool $isAdmin = false;

    public function __construct(
        string $identifier,
        string $target
    ) {
        $this->identifier = $identifier;
        $this->target = $target;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setTarget(string $target): void
    {
        $this->target = $target;
    }
}
