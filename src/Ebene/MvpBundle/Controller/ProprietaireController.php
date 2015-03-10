<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ebene\MvpBundle\Entity\Proprietaire;
use Ebene\MvpBundle\Form\ProprietaireType;

/**
 * Proprietaire controller.
 *
 */
class ProprietaireController extends Controller
{

    /**
     * Lists all Proprietaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EbeneMvpBundle:Proprietaire')->findAll();

        return $this->render('EbeneMvpBundle:Proprietaire:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Proprietaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Proprietaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mvp_proprietaire_show', array('id' => $entity->getId())));
        }

        return $this->render('EbeneMvpBundle:Proprietaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Proprietaire entity.
     *
     * @param Proprietaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Proprietaire $entity)
    {
        $form = $this->createForm(new ProprietaireType(), $entity, array(
            'action' => $this->generateUrl('mvp_proprietaire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Proprietaire entity.
     *
     */
    public function newAction()
    {
        $entity = new Proprietaire();
        $form   = $this->createCreateForm($entity);

        return $this->render('EbeneMvpBundle:Proprietaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Proprietaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Proprietaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proprietaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EbeneMvpBundle:Proprietaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Proprietaire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Proprietaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proprietaire entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EbeneMvpBundle:Proprietaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Proprietaire entity.
    *
    * @param Proprietaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Proprietaire $entity)
    {
        $form = $this->createForm(new ProprietaireType(), $entity, array(
            'action' => $this->generateUrl('mvp_proprietaire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Proprietaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Proprietaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proprietaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mvp_proprietaire_edit', array('id' => $id)));
        }

        return $this->render('EbeneMvpBundle:Proprietaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Proprietaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EbeneMvpBundle:Proprietaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Proprietaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mvp_proprietaire'));
    }

    /**
     * Creates a form to delete a Proprietaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mvp_proprietaire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
