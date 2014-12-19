<?php  
    namespace Planning\Bundle\Controller;

    use Planning\Bundle\Entity\Teachers;
    use Planning\Bundle\Form\TeachersType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    
    class TeachersController extends Controller{
        public function indexAction(Request $request){
            $teacher = new Teachers;
            $form = $this->createForm(new TeachersType(), $teacher);
            
            $em = $this->getDoctrine()->getManager(); // Entity manager

            $repository = $em->getRepository('PlanningBundle:Teachers'); // Repository
            $teachers = $repository->findAll();

            if ($request->isMethod('POST')) {
                if ($form->handleRequest($request)->isValid()) {
                    $em->persist($teacher);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Professeur bien enregistré.');
                    return $this->redirect($this->generateUrl('teachers'));
                }
            }else{
                return $this->render('PlanningBundle:Teachers:index.html.twig', 
                    array(
                        'form' => $form->createView(),
                        'teachers' => $teachers
                    )
                );
            }
        }

        public function editAction($id, Request $request){
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('PlanningBundle:Teachers');

            $teacher = $repository->find($id);
            
            $form = $this->createForm(new TeachersType(), $teacher);

            if (null === $teacher) {
                $request->getSession()->getFlashBag()->add('alert', "Le professeur d'id ".$id." n'existe pas.");
                return $this->redirect($this->generateUrl('teachers'));
            }else{
                if ($request->isMethod('POST')) {
                    if ($form->handleRequest($request)->isValid()) {
                        $em->flush();

                        $request->getSession()->getFlashBag()->add('notice', 'Le professeur a bien été modifié.');
                        return $this->redirect($this->generateUrl('teachers'));
                    }
                }else{
                    return $this->render('PlanningBundle:Teachers:edit.html.twig', 
                        array(
                            'form' => $form->createView(),
                        )
                    );
                }
            }
        }

        public function deleteAction($id, Request $request){
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('PlanningBundle:Teachers');

            $teacher = $repository->find($id);

            if (null === $teacher) {
                $request->getSession()->getFlashBag()->add('alert', "Le professeur d'id ".$id." n'existe pas.");
            }else{
                $em->remove($teacher);
                $em->flush();
                $request->getSession()->getFlashBag()->add('alert', "Le professeur d'id $id a bien été supprimé");
            }
            return $this->redirect($this->generateUrl('teachers'));
        }
    }
