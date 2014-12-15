<?php 
    namespace Planning\Bundle\Controller;
    
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Planning\Bundle\Entity\Holidays;
    use Planning\Bundle\Form\HolidaysType;

    class HolidaysController extends Controller{

        public function indexAction(Request $request){

            $holiday = new Holidays;
            $form = $this->createForm(new HolidaysType(), $holiday);
            
            $em = $this->getDoctrine()->getManager(); // Entity manager

            $holidays = $em->getRepository('PlanningBundle:Holidays')->findAll();

            if ($request->isMethod('POST')) {
                if ($form->handleRequest($request)->isValid()) {
                    $em->persist($holiday);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Le jour férié a bien été enregistré.');
                    return $this->redirect($this->generateUrl('holidays'));
                }
            }else{
                return $this->render('PlanningBundle:Holidays:index.html.twig', 
                    array(
                        'form' => $form->createView(),
                        'holidays' => $holidays
                    )
                );
            }
        }


        public function editAction(Request $request, $id){

            $em = $this->getDoctrine()->getManager();

            $holiday = $em->getRepository('PlanningBundle:Holidays')->find($id);
            
            $form = $this->createForm(new HolidaysType(), $holiday);

            if (!$holiday) {
                $request->getSession()->getFlashBag()->add('alert', "Le jour férié d'id  $id n'existe pas.");
                return $this->redirect($this->generateUrl('holidays'));
            }else{
                if ($request->isMethod('POST')) {
                    if ($form->handleRequest($request)->isValid()) {
                        $em->flush();

                        $request->getSession()->getFlashBag()->add('notice', 'Le jour férié a bien été modifié.');
                        return $this->redirect($this->generateUrl('holidays'));
                    }
                }else{
                    return $this->render('PlanningBundle:Holidays:edit.html.twig', 
                        array(
                            'form' => $form->createView(),
                        )
                    );
                }
            }
        }


        public function deleteAction(Request $request, $id){

            $em = $this->getDoctrine()->getManager();

            $holiday = $em->getRepository('PlanningBundle:Holidays')->find($id);

            if (!$holiday) {
                $this->get('session')->getFlashBag()->add('alert', "Le jour férié d'id  $id  n'existe pas.");
            }else{
                $em->remove($holiday);
                $em->flush();         
                $request->getSession()->getFlashBag()->add('notice', 'Le jour férié a bien été supprimé.');   
            }

            return $this->redirect($this->generateUrl('holidays'));
        }
    }
