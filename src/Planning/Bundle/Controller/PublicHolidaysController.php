<?php 
    namespace Planning\Bundle\Controller;
    
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Planning\Bundle\Entity\PublicHolidays;
    use Planning\Bundle\Form\PublicHolidaysType;

    class PublicHolidaysController extends Controller{

        public function indexAction(Request $request){

            $publicholiday = new PublicHolidays;
            $form = $this->createForm(new PublicHolidaysType(), $publicholiday);
            
            $em = $this->getDoctrine()->getManager(); // Entity manager

            $publicholidays = $em->getRepository('PlanningBundle:PublicHolidays')->findAll();

            if ($request->isMethod('POST')) {
                if ($form->handleRequest($request)->isValid()) {
                    $em->persist($publicholiday);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Le jour férié a bien été enregistré.');
                    return $this->redirect($this->generateUrl('publicholidays'));
                }
            }else{
                return $this->render('PlanningBundle:PublicHolidays:index.html.twig', 
                    array(
                        'form' => $form->createView(),
                        'publicholidays' => $publicholidays
                    )
                );
            }
        }


        public function editAction(Request $request, $id){

            $em = $this->getDoctrine()->getManager();

            $publicholiday = $em->getRepository('PlanningBundle:PublicHolidays')->find($id);
            
            $form = $this->createForm(new PublicHolidaysType(), $publicholiday);

            if (!$publicholiday) {
                $request->getSession()->getFlashBag()->add('alert', "Le jour férié d'id  $id n'existe pas.");
                return $this->redirect($this->generateUrl('publicholidays'));
            }else{
                if ($request->isMethod('POST')) {
                    if ($form->handleRequest($request)->isValid()) {
                        $em->flush();

                        $request->getSession()->getFlashBag()->add('notice', 'Le jour férié a bien été modifié.');
                        return $this->redirect($this->generateUrl('publicholidays'));
                    }
                }else{
                    return $this->render('PlanningBundle:PublicHolidays:edit.html.twig', 
                        array(
                            'form' => $form->createView(),
                        )
                    );
                }
            }
        }


        public function deleteAction(Request $request, $id){

            $em = $this->getDoctrine()->getManager();

            $publicholiday = $em->getRepository('PlanningBundle:PublicHolidays')->find($id);

            if (!$publicholiday) {
                $this->get('session')->getFlashBag()->add('alert', "Le jour férié d'id  $id  n'existe pas.");
            }else{
                $em->remove($publicholiday);
                $em->flush();         
                $request->getSession()->getFlashBag()->add('notice', 'Le jour férié a bien été supprimé.');   
            }

            return $this->redirect($this->generateUrl('publicholidays'));
        }
    }
