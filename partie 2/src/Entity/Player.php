<?php

use Doctrine\ORM\Mapping as ORM;

/**
* On déclare la classe comme entity : 
* @ORM\Entity()
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
    * @ORM\Column(type="string", length=50, nullable=false)
    */
    private $username;

    /**
    * @ORM\Column(type="string", length=50, nullable=false)
    */
    private $email;

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->username;
    }
    public function getemail(): string {
        return $this->email;
    }

    public function setName(string $username): void {
        $this->username = $username;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    
}