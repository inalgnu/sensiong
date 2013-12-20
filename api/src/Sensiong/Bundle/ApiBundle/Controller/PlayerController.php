<?php

namespace Sensiong\Bundle\ApiBundle\Controller;

use Sensiong\Bundle\ApiBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * @Config\Route("/players")
 */
class PlayerController extends Controller
{
    /**
     * @Config\Route("")
     * @Config\Method("GET")
     * @Rest\View()
     */
    public function indexAction()
    {
        return $this->get('sensiong.repository.player')->findAll();
    }

    /**
     * @Config\Route("/{id}")
     * @Config\Method("GET")
     * @Rest\View()
     */
    public function getAction(Player $player)
    {
        return $player;
    }

    /**
     * @Config\Route("")
     * @Config\Method("POST")
     * @Config\ParamConverter("requestPlayer", converter="fos_rest.request_body")
     * @Rest\View(statusCode=201)
     */
    public function newAction(Player $requestPlayer)
    {
        $player = new Player($requestPlayer->getName());

        $this->save($player);

        return $player;
    }

    /**
     * @Config\Route("/{id}", requirements={"id"="\d+"})
     * @Config\Method("PUT")
     * @Config\ParamConverter("requestPlayer", converter="fos_rest.request_body")
     * @Rest\View(statusCode=204)
     */
    public function updateAction(Player $player, Player $requestPlayer)
    {
        $player->updateFrom($requestPlayer);

        $this->save($player);
    }

    public function save(Player $player)
    {
        $this->getDoctrine()->getManager()->persist($player);
        $this->getDoctrine()->getManager()->flush($player);
    }
}
