<?php

namespace Atonbox\ContatoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Atonbox\ContatoBundle\Entity\Contato;
use Atonbox\ContatoBundle\Form\ContatoType;

/**
 * Contato controller.
 *
 */
class ContatoController extends Controller
{
    /**
     * Lists all Contato entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AtonboxContatoBundle:Contato')->findAll();

        return $this->render('AtonboxContatoBundle:Contato:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Contato entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtonboxContatoBundle:Contato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtonboxContatoBundle:Contato:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Contato entity.
     *
     */
    public function newAction()
    {
        $entity = new Contato();
        $form   = $this->createForm(new ContatoType(), $entity);

        return $this->render('AtonboxContatoBundle:Contato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Contato entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Contato();
        $form = $this->createForm(new ContatoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contato_show', array('id' => $entity->getId())));
        }

        return $this->render('AtonboxContatoBundle:Contato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contato entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtonboxContatoBundle:Contato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contato entity.');
        }

        $editForm = $this->createForm(new ContatoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AtonboxContatoBundle:Contato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contato entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AtonboxContatoBundle:Contato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContatoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contato_edit', array('id' => $id)));
        }

        return $this->render('AtonboxContatoBundle:Contato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contato entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AtonboxContatoBundle:Contato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contato entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contato'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
