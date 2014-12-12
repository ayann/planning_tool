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
        
        $em = $this->getDoctrine()->getManager(); // Entity manager

        $repository = $em->getRepository('PlanningBundle:Establishments'); // Repository

        $listEstablishments = $repository->findAll();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {
                $em->persist($establishments);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Établissement bien enregistrée.');

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
            $request->getSession()->getFlashBag()->add('alert', "L'établissement d'id ".$id." n'existe pas.");
        }else{
            $em->remove($establishment);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('planning_establishments'));
    }

    public function editEstablishmentAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('PlanningBundle:Establishments');

        $establishment = $repository->find($id);
        $listEstablishments = $repository->findAll();
        
        $form = $this->createForm(new EstablishmentsType(), $establishment);

        if (null === $establishment) {
            $request->getSession()->getFlashBag()->add('alert', "L'établissement d'id ".$id." n'existe pas.");
            return $this->redirect($this->generateUrl('planning_establishments'));
        }else{
            if ($request->isMethod('POST')) {
                if ($form->handleRequest($request)->isValid()) {
                    $em->flush();
                    $request->getSession()->getFlashBag()->add('notice', 'Établissement bien modifié.');
                    return $this->redirect($this->generateUrl('planning_establishments'));
                }
            }else{
                return $this->render('PlanningBundle:Planning:establishment_edit.html.twig', 
                    array(
                        'form' => $form->createView(),
                    )
                );
            }
        }
    }
}
