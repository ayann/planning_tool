<?php  
    namespace Planning\Bundle\Controller;

    use Planning\Bundle\Entity\Establishments;
    use Planning\Bundle\Form\EstablishmentsType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    
    class EstablishmentsController extends Controller{
        public function indexAction(Request $request){
            $establishments = new Establishments;
            $form = $this->createForm(new EstablishmentsType(), $establishments);
            
            $em = $this->getDoctrine()->getManager(); // Entity manager

            $repository = $em->getRepository('PlanningBundle:Establishments'); // Repository

            $listEstablishments = $repository->findAll();

            if ($request->isMethod('POST')) {
                if ($form->handleRequest($request)->isValid()) {
                    $em->persist($establishments);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Établissement bien enregistré.');

                    return $this->redirect($this->generateUrl('planning_establishments'));
                }
            }else{
                return $this->render('PlanningBundle:Establishments:index.html.twig', 
                    array(
                        'form' => $form->createView(),
                        'listEstablishments' => $listEstablishments
                    )
                );
            }
        }

        public function editAction($id, Request $request){
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
                    return $this->render('PlanningBundle:Establishments:edit.html.twig', 
                        array(
                            'form' => $form->createView(),
                        )
                    );
                }
            }
        }

        public function deleteAction($id, Request $request){
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
    }
