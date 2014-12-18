<?php

namespace Planning\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Planning\Bundle\Entity\Classrooms;
use Planning\Bundle\Form\ClassroomsType;

/**
 * Gestion des Salles
 * 
 */
class ClassroomsController extends Controller
{
    /**
     * Page Principale 
     * - Affiche le tableau contenant la totalité des Salles
     * - Affiche le formulaire d'ajout d'une salle
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function indexAction(Request $request){

        $classroom = new Classrooms;
        $form = $this->createForm(new ClassroomsType(), $classroom);
        
        $em = $this->getDoctrine()->getManager(); // Entity manager

        $classrooms = $em->getRepository('PlanningBundle:Classrooms')->findAll();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {
                $em->persist($classroom);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'La salle a bien été enregistrée.');
                return $this->redirect($this->generateUrl('classrooms'));
            }
        }else{
            return $this->render('PlanningBundle:Classrooms:index.html.twig', 
                array(
                    'form' => $form->createView(),
                    'classrooms' => $classrooms
                )
            );
        }
    }

    /**
     * Page de modification d'une salle
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id
     * @return type
     */
    public function editAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();

        $classroom = $em->getRepository('PlanningBundle:Classrooms')->find($id);
        
        $form = $this->createForm(new ClassroomsType(), $classroom);

        if (!$classroom) {
            $request->getSession()->getFlashBag()->add('alert', "La salle d'id  $id n'existe pas.");
            return $this->redirect($this->generateUrl('classrooms'));
        }else{
            if ($request->isMethod('POST')) {
                if ($form->handleRequest($request)->isValid()) {
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Le module a bien été modifié.');
                    return $this->redirect($this->generateUrl('classrooms'));
                }
            }else{
                return $this->render('PlanningBundle:Classrooms:edit.html.twig', 
                    array(
                        'form' => $form->createView(),
                    )
                );
            }
        }
    }

    /**
     * Supprimer une salle
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id
     * @return type
     */
    public function deleteAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();

        $classroom = $em->getRepository('PlanningBundle:Classrooms')->find($id);

        if (!$classroom) {
            $this->get('session')->getFlashBag()->add('alert', "La salle d'id  $id  n'existe pas.");
        }else{
            $em->remove($classroom);
            $em->flush();            
        }

        return $this->redirect($this->generateUrl('classrooms'));
    }
}
