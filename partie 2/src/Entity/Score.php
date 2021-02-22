<?php
namespace App\Entity;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRepository")
 * @ORM\Table(name="scores")
 */
class Score
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;


    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="score")
     */
    private Game $game;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="score")
     */
    private Player $player;

    /**
     * @ORM\Column(type="float", length=10, nullable=false)
     */
    private float $score;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;


    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return Game
     */
    public function getGame(): ?Game {
        return $this->game;
    }
    /**
     * @return Player
     */
    public function getPlayer(): Player {
        return $this->player;
    }

    /**
     * @return int
     */
    public function getScore(): ?int {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score)
    {
        $this->score = $score;
    }

    /**
     * @param Player $player
     */
    public function setPlayer(?Player $player)
    {
        $this->player = $player;
    }

    /**
     * @param Game $game
     */
    public function setGame(?Game $game)
    {
        $this->game = $game;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }

    /**
     * @param void
     */
    public function setCreatedAt()
    {
        //date_default_timezone_set('France/Paris');
        $this->createdAt = new DateTime('NOW');
    }

}


