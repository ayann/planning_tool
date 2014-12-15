<?php

namespace Planning\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Planning\Bundle\Entity\Promo;
use Planning\Bundle\Form\PromoType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PromoController extends Controller
{
    public function ViewAction()
    {
        return $this->render('PlanningBundle:Promo:view.html.twig');
    }
    
    public function getAjaxSourceAction(Request $request)
    {
        $get = $request->query->all();
        
        /* 
         * Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        
        $em = $this->getDoctrine()->getManager();
        $rResult = $em->getRepository('PlanningBundle:Promo')->ajaxTable($get, true);
        
        $totalSize = count($rResult->getArrayResult());
        
        if ( isset( $get['start'] ) && $get['length'] != '-1' )
        {
            $rResult->setFirstResult( (int)$get['start'] )
                    ->setMaxResults( (int)$get['length'] );
        }
        
        /*
        * Output
        */
        $output = array(
            "draw" => $get['draw'],
            "recordsTotal" => $totalSize,
            "recordsFiltered" => $totalSize,
            "data"  => array()
        );
        
        foreach($rResult->getArrayResult() as $aRow)
        {
            $row = array();
            foreach( $aRow as $key => $value)
            {
                if ( $key == "id" )
                {
                    $row[] = $value;
                }
                elseif( $key == "name" )
                {
                    $row[] = $value;
                }

            }
            $output['data'][] = $row;
        }

        unset($rResult);

        return new Response(json_encode($output));
    
    }

    public function addAction()
    {   
        $request = $this->getRequest();

	$promo = new Promo;
        $form = $this->createForm(new PromoType(), $promo);
        
        if($request->getMethod() == "POST") 
        {
            $form->bind($request);

            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($promo);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Établissement bien ajouté');
                
                return $this->redirect($this->generateUrl('planning_promo'));
            }
        }
		
        return $this->render('PlanningBundle:Promo:add.html.twig', array(
                'form' => $form->createView(),
        ));
    }
    
    public function editAction($id)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        
        
        $promo = $em->getRepository("PlanningBundle:Promo")->findOneBy(array('id' => $id, 'isValid' => 1));
        
        if(!$promo)
        {
            throw $this->createNotFoundException(
                'Promo was not found.'
            );
        }  

        $form = $this->createForm(new PromoType, $promo);
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if($form->isValid())
            {
                $em->persist($promo);
                $em->flush();
                
                return $this->redirect($this->generateUrl("planning_promo"));
            }

        }
        
        return $this->render('PlanningBundle:Promo:edit.html.twig', array(
            'form' => $form->createView(),
            'id' => $id,
        ));
    }
    
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
    	$promo = $em->getRepository('PlanningBundle:Promo')->findOneBy(array('id' => $id, 'isValid' => 1));
    	
    	if(!$promo)
    	{
            throw $this->createNotFoundException(
                    'Promo was not found.'
            );
    	}

    	$promo->setisValid(false);
    	$em->persist($promo);
    	$em->flush();
    	
    	$this->get('session')->getFlashBag()->add('info', 'Promo bien supprimé');
    		
    	return $this->redirect($this->generateUrl('planning_promo'));
    }
    
}
