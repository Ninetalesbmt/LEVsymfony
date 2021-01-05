<?php

namespace App\Controller;

use App\Entity\Lev;

use Symfony\Component\Form\Forms;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
    #[Route('/custom', name: 'custom')]
    public function custom(){
        $articles = $this->getDoctrine()->getRepository
        (Lev::class)->findAll();
        
        return $this->render('main/custom.html.twig', 
            array('articles' => $articles));

    }    
    
    #[Route('/manage', name: 'manage_show')]
    public function Levdatabase(){
        $articles = $this->getDoctrine()->getRepository
        (Lev::class)->findAll();
        
        return $this->render('main/table.html.twig', 
            array('articles' => $articles));

    }
    
    /**
     * @Route("/manage/", name="manage_list")
     * Method({"GET"})
     */
    public function managereturn(){
        $articles = $this->getDoctrine()->getRepository
        (Lev::class)->findAll();
        
        return $this->render('main/table.html.twig', 
            array('articles' => $articles));

    }
    
    /**
     * @Route("/manage/new", name="new_article")
     * Method({"GET", "POST"})
     */
    public function newar(Request $request) {
      $article = new Lev();

              
      $form = $this->createFormBuilder($article)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('type', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('year', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('country', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('image', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array(
              'label' => 'Create',
              'attr' => array('class' => 'btn btn-primary mt-3')
            ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {
        $article = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        return $this->redirectToRoute('manage_list');
      }

      return $this->render('main/newar.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/manage/edit/{id}", name="edit_article")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
      $article = new Lev();
      $article = $this->getDoctrine()->getRepository(Lev::class)->find($id);

      $form = $this->createFormBuilder($article)
        ->add('name', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('type', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('year', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('country', TextType::class, array('attr' => array('class' => 'form-control')))
              
        ->add('save', SubmitType::class, array(
          'label' => 'Update',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('manage_list');
      }

      return $this->render('main/editar.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/manage/show/{id}", name="article_show")
     */
    public function show($id) {
      $article = $this->getDoctrine()->getRepository(Lev::class)->find($id);

      return $this->render('main/show.html.twig', array('article' => $article));
    }

    /**
     * @Route("/manage/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
      $article = $this->getDoctrine()->getRepository(Lev::class)->find($id);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($article);
      $entityManager->flush();
      
      return $this->redirectToRoute('manage_list');
      $response = new Response();
      $response->send();
    }

}
