<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FormController extends AbstractController
{


    /**
         * @Route("/", name="form")
         * Method({"GET"})
         */

  public function index(Request $request){
    $formData = new User();
    $form = $this->createFormBuilder($formData)
    ->add('name', TextType::class, array('label'=>'Imię','required'=>true, 'attr'=>array('class'=> 'form-control')))
    ->add('last_name', TextType::class, array('label'=>'Nazwisko','required'=>true, 'attr'=> array('class'=>'form-control')))
    ->add('exp', TextType::class, array('label'=>'Doświadczenie','required'=>true, 'attr'=> array('class'=>'form-control')))
    ->add('city', TextType::class, array('label'=>'Miasto','required'=>true, 'attr'=> array('class'=>'form-control')))
    ->add('country', ChoiceType::class, array('label'=>'Kraj','choices' => array('Poland' => 'Poland', 'Other' => 'Inny'), 'required'=>true, 'attr'=>array('class'=>'form-control')))
    ->add('work_remote', CheckboxType::class, array('label'=>'Praca zdalna', 'required'=>false, 'attr'=> array('class'=>'form-control')))
    ->add('work_on_site', CheckboxType::class, array('label'=>'Praca na miejscu', 'required'=>false, 'attr'=> array('class'=>'form-control')))
    ->add('occupation', ChoiceType::class, array('label'=>'Profesja','choices' => array('Programista' => 'Programista', 'Koder' => 'Koder', 'Designer' => 'Designer'), 'required'=>true, 'attr'=>array('class'=>'form-control')))
    ->add('save', SubmitType::class, array(
        'label'=>'Zapisz',
        'attr'=>array('class'=>'btn btn-primary mt-3')))->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
          $formData = $form->getData();
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($formData);
          $entityManager->flush();
          return $this->redirectToRoute('list');
        }

    return $this->render('new.html.twig', array('form'=>$form->createView()));

  }

  /**
     * @Route("/list", name="list")
     * Method({"GET"})
     */
    public function list()
    {
      $data = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('data.html.twig', array(
            'data' => $data
        ));
    }


    /**
    * @Route("/delete/{id}")
    * @Method({"DELETE"})
    */

    public function delete(Request $request, $id) {
      $user = $this->getDoctrine()->getRepository(User::class)->find($id);
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($user);
      $entityManager->flush();
      $response = new Response();
      $response->send();
    }

}
