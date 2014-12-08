<?php

namespace Planning\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanningController extends Controller
{
    public function indexAction()
    {
        return $this->render('PlanningBundle:Planning:index.html.twig', array(
            '1' => 'x'
        ));
    }
}
