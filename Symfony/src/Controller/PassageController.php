<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\QuestionRepository;
use App\Entity\Question;
use App\Entity\Test;
use App\Entity\Passage;
use App\Form\QuestionType;
use App\Repository\TestRepository;
use Doctrine\ORM\Mapping\Id;


class PassageController extends AbstractController
{ 
   
    #[Route('/passage', name: 'app_passage')]
    public function index(): Response
    {
        return $this->render('passage/index.html.twig', [
            'controller_name' => 'PassageController',
        ]);
    }
    
    #[Route('/quests', name: 'app_test_quests')]
public function showTestForm(Request $request)
{
    // Get the ID of the selected test from the submitted form data
    $testId = $request->request->get('test_id');

    // Retrieve the list of questions associated with the selected test
    $questions = $this->getDoctrine()->getRepository(Question::class)->findBy(['test' => $testId]);

    // Render the form template
    return $this->render('front/test_form.html.twig', [
        'questions' => $questions,
        'testId' => $testId,
    ]);
}
#[Route('/quests/submit', name: 'app_test_submit')]
public function submitAnswer(Request $request)
{
    // Get the ID of the selected test from the submitted form data
    $testId = $request->request->get('test_id');

    // Retrieve the list of questions associated with the selected test
    $questions = $this->getDoctrine()->getRepository(Question::class)->findBy(['test' => $testId]);

    // Get the current user ID
    $user = $this->getUser();

    // Get the submitted answers from the form data
    $answers = $request->request->get('answer');

    // Retrieve the default score for the test
    $test = $this->getDoctrine()->getRepository(Test::class)->find($testId);

    // Initialize score and total number of questions
    $score = 0;
    $i=1;
    $numQuestions = count($questions);
    $totale = 0 ; 
    // Loop through each question and compare the submitted answer to the correct answer
    foreach ( $questions as $q) {
        

            $answer = $answers[$i];
            $totale = $totale + $q->getNote();
          
            if ($answer == $q->getReponse()) {
                
                $score += $q->getNote();
                
            }
          $i++;
        
    }
    
    // Calculate the percentage of correct answers
   
    // Update the Passage entity with the score and status
    $passage = new Passage();
    $passage->setUser($user);
    $passage->setTest($test);
    $passage->setScore($score);

    if ($score >= $totale / 2) {
        $passage->setEtat(1);
    } else {
        $passage->setEtat(0);
    }
    // Save the Passage object to the database
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($passage);
    $entityManager->flush();
    return $this->render('front/test_result.html.twig', [
        'questions' => $questions,
        'testId' => $testId,
        'passage' => $passage,
        'user' => $user,
        
        
    ]);
}}
