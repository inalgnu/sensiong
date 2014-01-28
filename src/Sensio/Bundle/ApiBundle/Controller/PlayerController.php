<?php

namespace Sensio\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\ApiBundle\Entity\Player;

class PlayerController extends Controller
{
    /**
     * @Rest\View()
     */
    public function queryAction()
    {
        return $this->getManager('Player')->findAll();
    }

    /**
     * @RestView()
     */
    public function getAction(Player $player)
    {
        return $player;
    }

    /**
     * @ParamConverter("player", converter="fos_rest.request_body")
     * @Rest\View(statusCode=201)
     */
    public function newAction(Player $player)
    {
        return $this->save($player);
    }

    /**
     * @ParamConverter("requestPlayer", converter="fos_rest.request_body")
     * @Rest\View(statusCode=204)
     */
    public function updateAction(Player $player, Player $requestPlayer)
    {
        $this->save($player->updateFrom($requestPlayer));
    }
}