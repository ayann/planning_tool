<?php

namespace Planning\Bundle\Controller;

use Planning\Bundle\Entity\Establishments;
use Planning\Bundle\Form\EstablishmentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlanningController extends Controller
{
    public function indexAction()
    {
        return $this->render('PlanningBundle:Planning:index.html.twig', array('1' => 'x'));
    }
    
    public function getViewPlanningByDateAction($dateStart=null,$dateEnd=null)
    {
        $value = array();
        return $this->render('PlanningBundle:Planning:viewPlanning.html.twig', $value);
    }
    
    public function GetDataPlanningByDate($dateStart=null,$dateEnd=null){
        $value = array();
        return json_encode($value);
    }

}
