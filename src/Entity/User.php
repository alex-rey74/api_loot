<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * @ApiResource()
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="users")
     * @ORM\JoinColumn(nullable=false, name="language_id", referencedColumnName="id")
     */
    private $language;

    /**
     * @ORM\OneToMany(targetEntity="Search", mappedBy="user")
     */
    private $user_searches;

    public function __construct()
    {
        $this->user_searches = new ArrayCollection();
    }

    /**
     * @ORM\ManyToMany(targetEntity="Game", inversedBy="users")
     * @ORM\JoinTable("users_games")
     */
    private $games;

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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $created_at
     */
    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language): void
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param mixed $games
     */
    public function setGames($games): void
    {
        $this->games = $games;
    }

    /**
     * @return Collection
     */
    public function getUserSearches(): Collection
    {
        return $this->user_searches;
    }

    /**
     * @param Collection $user_searches
     */
    public function setUserSearches(Collection $user_searches): void
    {
        $this->user_searches = $user_searches;
    }




}

