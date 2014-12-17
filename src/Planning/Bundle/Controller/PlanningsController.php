<?php

namespace Planning\Bundle\Controller;

use Planning\Bundle\Entity\Plannings;
use Planning\Bundle\Form\PlanningsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlanningsController extends Controller
{
    public function indexAction()
    {
        return $this->render('PlanningBundle:Planning:index.html.twig', array('1' => 'x'));
    }

    public function getAddAction(Request $request)
    {
        $planning = new Plannings;
        $form = $this->createForm(new PlanningsType(), $planning);
        
        $em = $this->getDoctrine()->getManager(); // Entity manager

        $plannings = $em->getRepository('PlanningBundle:Plannings')->findAll();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {
                $em->persist($planning);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Le jour férié a bien été enregistré.');
                return $this->redirect($this->generateUrl('planning_get_add'));
            }
        }

        return $this->render('PlanningBundle:Plannings:add.html.twig', 
            array(
                'form' => $form->createView(),
                'plannings' => $plannings
            )
        );
    }

    public function addAction()
    {
        return $this->render('.html.twig');
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
