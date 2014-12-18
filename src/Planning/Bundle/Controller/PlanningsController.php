<?php

namespace Planning\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Planning\Bundle\Entity\Plannings;
use Planning\Bundle\Form\PlanningsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class PlanningsController extends Controller{
    public function indexAction()
    {
        return $this->render('PlanningBundle:Plannings:index.html.twig', array('1' => 'x'));
    }

    public function getAddAction(Request $request){
        $em = $this->getDoctrine()->getManager(); // Entity manager

        $planning = new Plannings;
        $form = $this->createForm(new PlanningsType(), $planning);

        $repository = $em->getRepository('PlanningBundle:Plannings');
        $plannings = $repository->findAll();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {
                $errors = 0;

                if ($this->checkClassroom($planning, $repository, $request)){
                    $errors++;
                }

                if ($this->checkPromo($planning, $repository, $request)) {
                    $errors++;
                }

                if ($errors == 0) {
                    $em->persist($planning);
                    $em->flush();                    
                    $request->getSession()->getFlashBag()->add('notice', 'Le cours a bien été plannifié.');
                    return $this->redirect($this->generateUrl('planning_get_add'));
                }
            }
        }

        return $this->render('PlanningBundle:Plannings:list.html.twig', 
            array(
                'form' => $form->createView(),
                'plannings' => $plannings
            )
        );
    }

    private function checkClassroom($planning, $repository, $request){
        $query = $repository->createQueryBuilder('p')
            ->where('p.start <= :end')
            ->andWhere('p.end >= :start')
            ->setParameters(array('start' => $planning->getStart(), 'end'  => $planning->getEnd()))
            ->getQuery();

        $classrooms = array();

        foreach ($query->getResult() as $value) {
            $classrooms[] = $value->getClassroom();
        }


        if (in_array($planning->getClassroom(), $classrooms)) {
            $request->getSession()->getFlashBag()->add('alert', 'La salle est occupé durant cette période.');
            return true;
        }else{
            return false;
        }
    }

    private function checkPromo($planning, $repository, $request){
        $query = $repository->createQueryBuilder('p')
            ->where('p.start <= :end')
            ->andWhere('p.end >= :start')
            ->setParameters(array('start' => $planning->getStart(), 'end' => $planning->getEnd()))
            ->getQuery();

        $promos = array();

        foreach ($query->getResult() as $value) {
            $promos[] = $value->getPromo();
        }

        if (in_array($planning->getPromo(), $promos)) {
            $request->getSession()->getFlashBag()->add('alert', 'La promo spécifié a déjà un cour plannifié durant cette période.');
            return true;
        }else{
            return false;
        }
    }

    // get Edit action

    public function editAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();

        $planning = $em->getRepository('PlanningBundle:Plannings')->find($id);
        
        $form = $this->createForm(new PlanningsType(), $planning);

        if (!$planning) {
            $request->getSession()->getFlashBag()->add('alert', "Le cours d'id $id n'existe pas.");
            return $this->redirect($this->generateUrl('planning_get_add'));
        }

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Le cours a bien été modifié.');
                return $this->redirect($this->generateUrl('planning_get_add'));
            }
        }

        return $this->render('PlanningBundle:Plannings:add.html.twig', 
            array(
                'form' => $form->createView(),
            )
        );
    }
    
    public function deleteAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();

        $course = $em->getRepository('PlanningBundle:Plannings')->find($id);

        if (!$course) {
            $request->getSession()->getFlashBag()->add('alert', "Le cours d'id ".$id." n'existe pas.");
        }else{
            $em->remove($course);
            $em->flush();
            $request->getSession()->getFlashBag()->add('alert', "Le cours d'id ".$id." a bien été supprimé.");
        }
        return $this->redirect($this->generateUrl('planning_get_add'));
    }

    public function showAllAction(){
        $em = $this->getDoctrine()->getManager(); // Entity manager

        $promos = $em->getRepository('PlanningBundle:Promos')->findAll();

        return $this->render('PlanningBundle:Plannings:show_all.html.twig',
            array('promos' => $promos)
        );
    }

    public function getViewPlanningByDateAction($dateStart=null,$dateEnd=null){
        $value = array();
        return $this->render('PlanningBundle:Plannings:viewPlanning.html.twig', $value);
    }
    
    public function GetDataPlanningByDate($dateStart=null,$dateEnd=null){
        $value = array();
        return json_encode($value);
    }

}
