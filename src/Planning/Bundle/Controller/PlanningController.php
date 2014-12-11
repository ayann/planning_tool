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

    public function establishmentsAction(Request $request){
        $establishments = new Establishments;
        $form = $this->createForm(new EstablishmentsType(), $establishments);

        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('PlanningBundle:Establishments')
        ;

        $listEstablishments = $repository->findAll();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($establishments);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

                return $this->redirect($this->generateUrl('planning_establishments'));
            }
        }else{
            return $this->render('PlanningBundle:Planning:establishments.html.twig', 
                array(
                    'form' => $form->createView(),
                    'listEstablishments' => $listEstablishments
                )
            );
        }
    }

    public function deleteEstablishmentAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('PlanningBundle:Establishments');

        $establishment = $repository->find($id);

        if (null === $establishment) {
            $request->getSession()->getFlashBag()->add('notice', "L'établissement d'id ".$id." n'existe pas.");
        }else{
            $em->remove($establishment);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('planning_establishments'));
    }
}
