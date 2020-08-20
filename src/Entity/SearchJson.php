<?php


namespace App\Entity;


class SearchJson
{
    private $id;

    private $created_at;

    private $type;

    private $nbrJoueur;

    private $id_user;

    private $id_game;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNbrJoueur()
    {
        return $this->nbrJoueur;
    }

    /**
     * @param mixed $nbrJoueur
     */
    public function setNbrJoueur($nbrJoueur): void
    {
        $this->nbrJoueur = $nbrJoueur;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getIdGame()
    {
        return $this->id_game;
    }

    /**
     * @param mixed $id_game
     */
    public function setIdGame($id_game): void
    {
        $this->id_game = $id_game;
    }


}
