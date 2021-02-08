<?php

use Doctrine\ORM\Mapping as ORM;

/**
* On déclare la classe comme entity : 
* @ORM\Entity()
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
    * @ORM\Column(type="datetime")
    */
    private $created_at;

    public function getId(): int {
        return $this->id;
    }
    public function getScore(): string {
        return $this->score;
    }
    public function getemail(): int {
        return $this->created_at;
    }

    public function setName(string $score): void {
        $this->score = $score;
    }
    public function setEmail(string $created_at): void {
        $this->created_at = $created_at;
    }
    
}