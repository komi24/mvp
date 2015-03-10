<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ebene\MvpBundle\Entity\Restaurant;
use Ebene\MvpBundle\Form\RestaurantType;

/**
 * Restaurant controller.
 *
 */
class RestaurantController extends Controller
{

    /**
     * Lists all Restaurant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EbeneMvpBundle:Restaurant')->findAll();

        return $this->render('EbeneMvpBundle:Restaurant:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Restaurant entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Restaurant();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mvp_restaurant_show', array('id' => $entity->getId())));
        }

        return $this->render('EbeneMvpBundle:Restaurant:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Restaurant entity.
     *
     * @param Restaurant $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Restaurant $entity)
    {
        $form = $this->createForm(new RestaurantType(), $entity, array(
            'action' => $this->generateUrl('mvp_restaurant_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Restaurant entity.
     *
     */
    public function newAction()
    {
        $entity = new Restaurant();
        $form   = $this->createCreateForm($entity);

        return $this->render('EbeneMvpBundle:Restaurant:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Restaurant entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Restaurant entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EbeneMvpBundle:Restaurant:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Restaurant entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Restaurant entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EbeneMvpBundle:Restaurant:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Restaurant entity.
    *
    * @param Restaurant $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Restaurant $entity)
    {
        $form = $this->createForm(new RestaurantType(), $entity, array(
            'action' => $this->generateUrl('mvp_restaurant_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Restaurant entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Restaurant entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mvp_restaurant_edit', array('id' => $id)));
        }

        return $this->render('EbeneMvpBundle:Restaurant:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Restaurant entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Restaurant entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mvp_restaurant'));
    }

    /**
     * Creates a form to delete a Restaurant entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mvp_restaurant_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
