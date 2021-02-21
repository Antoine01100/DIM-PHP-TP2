<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* On déclare la classe comme entity : 
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
*
* On définit le nom de sa table :
* @ORM\Table(name="games")
*
*/
class Game
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=50, nullable=true)
    */
    private  ?string $name ="";

    /**
    * @ORM\Column(type="string", length=200, nullable=true)
    */
    private ?string $image ="";


    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getimage(): string {
        return $this->image;
    }


    /**
     * @param string $name
     * @return Game
     */
    public function setName(?string $name): Game {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $image
     * @return Game
     */
    public function setImage(?string $image): Game {
        $this->image = $image;
        return $this;

    }
    
}