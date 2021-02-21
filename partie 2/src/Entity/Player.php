<?php
namespace App\Entity;
use Doctrine\ORM\Mapping\OneToOne;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
/**
* On déclare la classe comme entity : 
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
*
* On définit le nom de sa table :
* @ORM\Table(name="players")
*
*/
class Player
{
    /**
     * // Le champ sera une clé primaire
     * @ORM\Id()
     * // Le champ sera de type int
     * @ORM\Column(type="integer")
     * // Le champ sera une valeur auto-générée (autoincrement)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=50, nullable=true)
    */
    private $username;

    /**
    * @ORM\Column(type="string", length=50, nullable=true)
    */
    private $email;

      /**
     * @OneToOne(targetEntity="Game")
     */
    private Player $owns;

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->username;
    }
    public function getemail(): string {
        return $this->email;
    }

    public function setName(string $username): Player {
        $this->username = $username;
        return $this;

    }
    public function setEmail(string $email): Player {
        $this->email = $email;
        return $this;

    }
    public function setgame(Game $game)
    {
        $this->game = $game;
    }
    
}