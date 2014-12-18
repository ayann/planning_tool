<?php  
    namespace Planning\Bundle\Controller;

    use Planning\Bundle\Entity\Courses;
    use Planning\Bundle\Form\CoursesType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    
    /**
     * Gestion des cours
     */
    class CoursesController extends Controller
    {
        /**
         *  Page Principale 
         * - Affiche le tableau contenant les cours
         * - Affiche le formulaire d'ajout de cours
         * 
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return type
         */
        public function indexAction(Request $request){
            $course = new Courses;
            $form = $this->createForm(new CoursesType(), $course);
            
            $em = $this->getDoctrine()->getManager(); // Entity manager

            $repository = $em->getRepository('PlanningBundle:Courses'); // Repository
            $courses = $repository->findAll();

            if ($request->isMethod('POST')) {
                if ($form->handleRequest($request)->isValid()) {
                    $em->persist($course);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Cours bien enregistré.');
                    return $this->redirect($this->generateUrl('planning_courses'));
                }
            }else{
                return $this->render('PlanningBundle:Courses:index.html.twig', 
                    array(
                        'form' => $form->createView(),
                        'courses' => $courses
                    )
                );
            }
        }
        
        /**
         * Modifier un cours
         * 
         * @param type $id
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return type
         */
        public function editAction($id, Request $request){
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('PlanningBundle:Courses');

            $course = $repository->find($id);
            
            $form = $this->createForm(new CoursesType(), $course);

            if (null === $course) {
                $request->getSession()->getFlashBag()->add('alert', "Le module d'id ".$id." n'existe pas.");
                return $this->redirect($this->generateUrl('planning_courses'));
            }else{
                if ($request->isMethod('POST')) {
                    if ($form->handleRequest($request)->isValid()) {
                        $em->flush();

                        $request->getSession()->getFlashBag()->add('notice', 'Le module a bien été modifié.');
                        return $this->redirect($this->generateUrl('planning_courses'));
                    }
                }else{
                    return $this->render('PlanningBundle:Courses:edit.html.twig', 
                        array(
                            'form' => $form->createView(),
                        )
                    );
                }
            }
        }
        
        /**
         * Supprimer un cours
         * 
         * @param type $id
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return type
         */
        public function deleteAction($id, Request $request){
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('PlanningBundle:Courses');

            $course = $repository->find($id);

            if (null === $course) {
                $request->getSession()->getFlashBag()->add('alert', "Le module d'id ".$id." n'existe pas.");
            }else{
                $em->remove($course);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('planning_courses'));
        }
    }
