<?php

namespace Sensiong\Bundle\ApiBundle\Controller;

use Sensiong\Bundle\ApiBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/players")
 */
class PlayerController extends Controller
{
    /**
     * @Route("")
     * @Method("GET")
     */
    public function indexAction()
    {
        $players = $this->getDoctrine()->getManager()->getRepository('Sensiong\Bundle\ApiBundle\Entity\Player')->findAll();

        return new JsonResponse($this->get('serializer')->serialize($players,'json'));
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function getAction(Player $player)
    {
        return new JsonResponse($this->get('serializer')->serialize($player,'json'));
    }

    /**
     * @Route("")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        /** @var $content \Sensiong\Bundle\ApiBundle\Entity\Player */
        $content = $this->get('serializer')->deserialize($request->getContent(), 'Sensiong\Bundle\ApiBundle\Entity\Player','json');

        $player = new Player($content->getName());
        $this->getDoctrine()->getManager()->persist($player);
        $this->getDoctrine()->getManager()->flush($player);

        return new Response(null, 201);
    }

    /**
     * @Route("/{id}")
     * @Method("PUT")
     */
    public function updateAction(Player $player, Request $request)
    {
        /** @var $player \Sensiong\Bundle\ApiBundle\Entity\Player */
        $content = $this->get('serializer')->deserialize($request->getContent(), 'Sensiong\Bundle\ApiBundle\Entity\Player','json');

        $player->setScore($content->getScore());

        $this->getDoctrine()->getManager()->persist($player);
        $this->getDoctrine()->getManager()->flush($player);

        return new Response(null, 204);
    }
}
