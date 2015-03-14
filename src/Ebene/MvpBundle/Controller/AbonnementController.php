<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ebene\MvpBundle\Entity\Abonnement;
use Ebene\MvpBundle\Form\AbonnementType;

/**
 * Abonnement controller.
 *
 */
class AbonnementController extends Controller
{

    /**
     * Lists all Abonnement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EbeneMvpBundle:Abonnement')->findAll();

        return $this->render('EbeneMvpBundle:Abonnement:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Abonnement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Abonnement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mvp_abonnement_show', array('id' => $entity->getId())));
        }

        return $this->render('EbeneMvpBundle:Abonnement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Abonnement entity.
     *
     * @param Abonnement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Abonnement $entity)
    {
        $form = $this->createForm(new AbonnementType(), $entity, array(
            'action' => $this->generateUrl('mvp_abonnement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Abonnement entity.
     *
     */
    public function newAction()
    {
        $entity = new Abonnement();
        $form   = $this->createCreateForm($entity);

        return $this->render('EbeneMvpBundle:Abonnement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Abonnement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Abonnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abonnement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EbeneMvpBundle:Abonnement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Abonnement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Abonnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abonnement entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EbeneMvpBundle:Abonnement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Abonnement entity.
    *
    * @param Abonnement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Abonnement $entity)
    {
        $form = $this->createForm(new AbonnementType(), $entity, array(
            'action' => $this->generateUrl('mvp_abonnement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Abonnement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Abonnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abonnement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mvp_abonnement_edit', array('id' => $id)));
        }

        return $this->render('EbeneMvpBundle:Abonnement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Abonnement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EbeneMvpBundle:Abonnement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Abonnement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mvp_abonnement'));
    }

    /**
     * Creates a form to delete a Abonnement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mvp_abonnement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
