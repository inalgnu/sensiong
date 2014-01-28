<?php

namespace Sensio\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class Controller extends BaseController
{
    public function getManager($entity)
    {
        return $this->getDoctrine()->getManager()->getRepository(sprintf('Sensio\Bundle\ApiBundle\Entity\%s', $entity));
    }

    public function save($entity)
    {
        $this->getDoctrine()->getManager()->persist($entity);
        $this->getDoctrine()->getManager()->flush();

        return $entity;
    }
}