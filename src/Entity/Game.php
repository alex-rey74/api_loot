<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 * @ApiResource()
 * @ORM\Table(name="game")
 * @ORM\Entity
 */
class Game
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="Platform", inversedBy="games")
     * @ORM\JoinColumn(nullable=false, name="platform_id", referencedColumnName="id")
     */
    private $platform;

    /**
     * @ORM\OneToMany(targetEntity="Search", mappedBy="game")
     */
    private $searches;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="games")
     */
    private $users;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param mixed $platform
     */
    public function setPlatform($platform): void
    {
        $this->platform = $platform;
    }

    /**
     * @return Collection
     */
    public function getSearches(): Collection
    {
        return $this->searches;
    }

    /**
     * @param Collection $searches
     */
    public function setSearches(Collection $searches): void
    {
        $this->searches = $searches;
    }



    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users): void
    {
        $this->users = $users;
    }

    public function __construct()
    {
        $this->searches = new ArrayCollection();
    }

}
