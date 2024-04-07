<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\Type\TaskType;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="app_task")
     */
    public function index(): Response
    {
        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }

    public function new(Request $request): Response{

        $task = new Task();
        $task->setTask('Complete symfony documentation');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->setAction($this->generateUrl('target_url'))
            ->setMethod('GET')
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();      
    }

    /**
     * @Route("form")
     */
    public function new1(Request $request):Response {
        
        $task = new Task();
        // $task->setTask('To Complete symfony documentation');
        // $task->setDueDate(new \DateTime('tomorrow'));

        $dueDateIsRequired = new \DateTime('tomorrow');

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        var_dump($form->isSubmitted());
        
        if($form->isSubmitted() && $form->isValid()){

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->render('task/submit.html.twig');
        }

        return $this->render('task/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    // Set action and method parameter
    // $form = $this->createForm(TaskType::class, $task, [
    //     'action' => $this->generateUrl('target_route'),
    //     'method' => 'GET',
    // ]);

    // If you need extra fields in the form that won't be stored in the object (for example to add an 
    // "I agree with these terms" checkbox), set the mapped option to false in those fields:
    // $builder
    //         ->add('task')
    //         ->add('dueDate')
    //         ->add('agreeTerms', CheckboxType::class, ['mapped' => false])
    //         ->add('save', SubmitType::class)
    //     ;

}
