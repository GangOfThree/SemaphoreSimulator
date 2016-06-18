<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Semaforo;
use AppBundle\Form\SemaforoType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


/**
 * Semaforo controller.
 *
 * @Route("/semaforo")
 */
class SemaforoController extends Controller
{
    /**
     * Lists all Semaforo entities.
     *
     * @Route("/", name="semaforo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $semaforos = $em->getRepository('AppBundle:Semaforo')->findAll();

        return $this->render('semaforo/index.html.twig', array(
            'semaforos' => $semaforos,
        ));
    }

    /**
     * Creates a new Semaforo entity.
     *
     * @Route("/new", name="semaforo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $semaforo = new Semaforo();
        $form = $this->createForm('AppBundle\Form\SemaforoType', $semaforo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($semaforo);
            $em->flush();

            return $this->redirectToRoute('semaforo_index');
        }

        return $this->render('semaforo/form.html.twig', array(
            'semaforo' => $semaforo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Semaforo entity.
     *
     * @Route("/{id}/show", name="semaforo_show")
     * @Method("GET")
     */
    public function showAction(Semaforo $semaforo)
    {
        return $this->render('semaforo/show.html.twig', array(
            'semaforo' => $semaforo,
        ));
    }

    /**
     * Displays a form to edit an existing Semaforo entity.
     *
     * @Route("/{id}/edit", name="semaforo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Semaforo $semaforo)
    {
        $editForm = $this->createForm('AppBundle\Form\SemaforoType', $semaforo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($semaforo);
            $em->flush();

            return $this->redirectToRoute('semaforo_index');
        }

        return $this->render('semaforo/form.html.twig', array(
            'semaforo' => $semaforo,
            'form' => $editForm->createView(),
            'edit' => true,
        ));
    }

    /**
     * Deletes a Semaforo entity.
     *
     * @Route("/{id}/delete", name="semaforo_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Semaforo $semaforo)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($semaforo);
        $em->flush();

        return $this->redirectToRoute('semaforo_index');
    }

    /**
     * Returns a JSON list of Semaforos.
     *
     * @Route("/json", name="semaforo_list_JSON")
     * @Method({"GET", "POST"})
     */
    public function getSemaphoresJSONAction(){

        $em = $this->getDoctrine()->getManager();

        $semaforos = $em->getRepository('AppBundle:Semaforo')->findAll();

        $jsonContent=$this->jsonSerialize($semaforos);

        return new Response($jsonContent);
    }

     /**
     * Returns a JSON list of Semaforos.
     *
     * @Route("/json/{id}", name="semaforo_JSON")
     * @Method({"GET", "POST"})
     */
    public function getSemaphoreJSONAction(Semaforo $semaforo){

        return new Response($this->jsonSerialize($semaforo,false));
    }

    private function jsonSerialize($semaforos, $hideFields=true){
        $normalizer= new ObjectNormalizer();

        if($hideFields){
            $normalizer->setIgnoredAttributes(array('id','autosPorMinuto','frecuencia'));
        }
        else{
            $normalizer->setIgnoredAttributes(array('id'));   
        }
        
        $encoders = array(new JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->serialize($semaforos, 'json');
    }

}
