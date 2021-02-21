<?php
namespace App\Entity;
use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
* On déclare la classe comme entity : 
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRepository")
*
* On définit le nom de sa table :
* @ORM\Table(name="scores")
*
*/
class Score
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=50, nullable=false)
    */
    private $score;
     /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="score")
     */
    private Game $game;
        /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="score")
     */
    private Player $player;

    /**
     * @var DateTime
    * @ORM\Column(type="datetime")
    */
    private $created_at;


    public function getId(): int {
        return $this->id;
    }
    public function getScore(): string {
        return $this->score;
    }
    /**
     * @return DateTime
     */
    public function getCreated_at(): DateTime {
        return $this->created_at;
    }
    public function getPlayer(): ?Player
    {
        return $this->player;
    }
    public function getGame(): ?Game
    {
        return $this->game;
    }


    public function setScore(int $score)
    {
        $this->score = $score;
    }
    public function setName(string $score): void {
        $this->score = $score;
    }
    public function setCreatedAt()
    {
        //date_default_timezone_set('France/Paris');
        $this->createdAt = new DateTime('NOW');
    }
    public function setPlayer(?Player $player): Score
    {
        $this->player = $player;
        return $this;
    }

    public function setGame(?Game $game): Score
    {
        $this->game = $game;
        return $this;
    }
    
}