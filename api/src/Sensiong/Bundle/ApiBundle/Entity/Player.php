<?php

namespace Sensiong\Bundle\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Player
 *
 * @ORM\Table("player")
 * @ORM\Entity()
 */
class Player
{
    const BASE_SCORE = 1000;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var integer
     *
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
        $this->name = $player->name;
        $this->score= $player->score;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getName()
    {
        return $this->name;
    }
}
