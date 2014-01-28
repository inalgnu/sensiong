<?php

namespace Sensio\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

class PlayerController
{
    /**
     * @Rest\View()
     */
    public function queryAction()
    {
        return array();
    }
}