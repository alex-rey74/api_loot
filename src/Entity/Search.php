<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Search
 * @ApiResource()
 * @ORM\Table(name="search")
 * @ORM\Entity
 */
class Search
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="searches")
     * @ORM\JoinColumn(nullable=false, name="game_id", referencedColumnName="id")
     */
    private $game;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_searches")
     * @ORM\JoinColumn(nullable=false, name="user_id", referencedColumnName="id")
     */
    private $user;

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
     * @return bool
     */
    public function isType(): bool
    {
        return $this->type;
    }

    /**
     * @param bool $type
     */
    public function setType(bool $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param mixed $game
     */
    public function setGame($game): void
    {
        $this->game = $game;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }


}
