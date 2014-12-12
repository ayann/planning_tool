<?php  
    namespace Planning\Bundle\Controller;

    use Planning\Bundle\Entity\Courses;
    use Planning\Bundle\Form\CoursesType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    
    class CoursesController extends Controller{
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
    }
