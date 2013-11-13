<?php
namespace Sensiong\Bundle\ApiBundle\Fixtures;

use Doctrine\ORM\EntityManager;

class Player
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function load()
    {
        $players = [
            new \Sensiong\Bundle\ApiBundle\Entity\Player('Greg'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('Romain'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('Inal'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('Jeff'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('AnneSo'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('Ondine'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('JulienG'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('Sarah'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('JulienM'),
            new \Sensiong\Bundle\ApiBundle\Entity\Player('Robin')
        ];

        foreach ($players as $player) {
            $this->em->persist($player);
        }

        $this->em->flush();
    }
}