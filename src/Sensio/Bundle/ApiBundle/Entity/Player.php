<?php

namespace Sensio\Bundle\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Contract
 *
 * @ORM\Table("player")
 * @ORM\Entity
 */
class Player
{
    const BASE_SCORE = 1000;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    public function __construct($name)
    {
        $this->name = $name;
        $this->score = self::BASE_SCORE;

        return $this;
    }

    public function updateFrom(Player $player)
    {
        $this->score = $player->getScore();

        return $this;
    }

    public function getScore()
    {
        return $this->score;
    }
}