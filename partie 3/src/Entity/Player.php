<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 * @ORM\Table(name="players")
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private ?string $username = " ";
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private ?string $email = " ";

    /**
     * @OneToOne(targetEntity="Game")
     */
    private Player $owns;

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getUserName(): ?string {
        return $this->username;
    }
    /**
     * @return string
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Player
     */
    public function setEmail(?string $email): Player
    {
        $this->email = $email;
        return $this;
    }
    /**
     * @param string $email
     * @return Player
     */
    public function setUsername(?string $username): Player
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param Game $game

     */
    public function setgame(Game $game)
    {
        $this->game = $game;
    }





}
