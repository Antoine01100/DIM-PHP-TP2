<?php

use Doctrine\ORM\Mapping as ORM;

/**
* On déclare la classe comme entity : 
* @ORM\Entity()
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
    * @ORM\Column(type="string", length=50, nullable=false)
    */
    private $name;

    /**
    * @ORM\Column(type="string", length=200, nullable=false)
    */
    private $image;

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getimage(): string {
        return $this->image;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }
    public function setEmail(string $image): void {
        $this->image = $image;
    }
    
}