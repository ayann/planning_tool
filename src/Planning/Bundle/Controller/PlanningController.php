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
    
    public function getViewPlanningByDateAction($dateStart=null,$dateEnd=null)
    {
        $value = array();
         return $this->render('PlanningBundle:Planning:viewPlanning.html.twig', $value);
    }
    
    public function GetDataPlanningByDate($dateStart=null,$dateEnd=null)
    {
        $value = array();
        return json_encode($value);
    }

    public function establishmentsAction()
    {
        return $this->render('PlanningBundle:Planning:establishments.html.twig');
    }
}
