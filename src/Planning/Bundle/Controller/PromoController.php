<?php

namespace Planning\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use \Symfony\Component\HttpFoundation\Response;
class PromoController extends Controller
{
    public function ViewAction()
    {
        return $this->render('PlanningBundle:Promo:viewPromo.html.twig', array(
            '1' => 'x'
        ));
    }
    
    public function getAjaxSourceAction(Request $request)
    {
        
        $get = $request->query->all();

        /* 
         * Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        
        $columns = array( 
            'CT.lastName',   
            'CX.name',  
            'T.id as TicketID', 
            'P.brandName', 
            'TS.title', 
            'T.question', 
            'F.id as FaqID', 
            'T.attributedUserId', 
            'T.createDate',
            'T.updateDate' 
        );
        
        $columnsResult = array( 
            'lastName',   
            'name',  
            'TicketID', 
            'brandName', 
            'title', 
            'question', 
            'FaqID', 
            'attributedUserId', 
            'createDate',
            'updateDate' 
        );
        
        $get['columns'] = &$columns;

        $em = $this->getDoctrine()->getManager();
        $rResult = $em->getRepository('SupportBundle:Ticket')->ajaxTable($get, true);
        
        $iFilteredTotal = count($rResult->getArrayResult());
        
        if ( isset( $get['iDisplayStart'] ) && $get['iDisplayLength'] != '-1' )
        {
            $rResult->setFirstResult( (int)$get['iDisplayStart'] )
                    ->setMaxResults( (int)$get['iDisplayLength'] );
        }
        
        /*
        * Output
        */
        $output = array(
            "sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $em->getRepository('SupportBundle:Ticket')->getCount(),
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        
        foreach($rResult->getArrayResult() as $aRow)
        {
            $row = array();
            
            for ( $i=0 ; $i < count($columnsResult) ; $i++ )
            {
                if ( $columnsResult[$i] == "TicketID" )
                {
                    // Special output formatting for 'version' column 
                    $ticket = $em->getRepository('SupportBundle:Ticket')->find($aRow[ $columnsResult[$i] ]);
                    $url = $this->get('router')->generate('umdssupport_interaction_view', array('id' => $ticket->getInteraction()->getId()));
                    $row[] = '<a href="'.$url.'" class="btn" rel="tooltip" title="Edit">'.$this->getTicketName($ticket).'</a>';
                    //$row[] = '';
                } 
                elseif ( $columnsResult[$i] == "question" )
                {
                    // Special output formatting for 'version' column 
                    $row[] = '<a role="button" class="btn open-modal-box-data" data-content="'. $aRow[ $columnsResult[$i] ] .'" data-label="Question" data-toggle="modal">'. substr ( $aRow[ $columnsResult[$i] ], 0, 20 ) .'... </a><div style="display: none;">'. $aRow[ $columnsResult[$i] ] .'</div>';
                
                } 
                elseif ( $columnsResult[$i] == "FaqID" )
                {
                    if($aRow[ $columnsResult[$i]] != null )
                    {
                        $faq = $em->getRepository('umdsKnowledgeBaseBundle:Faq')->find($aRow[ $columnsResult[$i] ]);
                        $url = $this->get('router')->generate('umdsknowledgebase_faq_viewlite', array('id' => $faq->getId()));
                        // Special output formatting for 'version' column 
                        $row[] = '<a href="'.$url.'" class="btn open-modal-box" data-label="FAQ - Détail">
                        '.$faq->getReference().'
                        </a>
                        <div style="display: none;">
                            '.$faq->getReference().'
                            '.$faq->getQuestion().'
                            '.$faq->getAnswer().'
                        </div>';
                    }
                    else 
                    {
                        $row[] = '';
                    }
                } 
                elseif ( $columnsResult[$i] == "attributedUserId" )
                {
                    $users = $this->getDoctrine()->getManager()
                        ->createQuery('SELECT U.username FROM umdsUserBundle:User U where U.id = '.$aRow[ $columnsResult[$i] ].'')
                        ->setMaxResults(1)
                        ->getSingleScalarResult();
                    
                    $row[] = $users;
                }
                elseif ( $columnsResult[$i] == "updateDate" )
                {
                    // Special output formatting for 'version' column 
                    $updateDate = $aRow[ $columnsResult[$i] ];
                    $row[] = $updateDate->format('d/m/Y');
                }
                elseif ( $columnsResult[$i] == "createDate" )
                {
                    // Special output formatting for 'version' column 
                    $createDate = $aRow[ $columnsResult[$i] ];
                    $row[] = $createDate->format('d/m/Y');
                }
                elseif ( $columns[$i] != ' ' )
                {
                    // General output 
                    $row[] = $aRow[ $columnsResult[$i] ];
                 
                }else{
                    
                    // General output 
                    $row[] = $aRow[ $columnsResult[$i] ];
                }
                
            }
            
            $output['aaData'][] = $row;
        }

        unset($rResult);

        return new \Symfony\Component\HttpFoundation\Response(json_encode($output));
    
    }
    
    public function EditAction()
    {
        return $this->render('PlanningBundle:Promo:index.html.twig', array(
            '1' => 'x'
        ));
    }
    public function AddAction()
    {
        return $this->render('PlanningBundle:Promo:index.html.twig', array(
            '1' => 'x'
        ));
    }
    public function DeleteAction()
    {
        return $this->render('PlanningBundle:Promo:index.html.twig', array(
            '1' => 'x'
        ));
    }
    
}
