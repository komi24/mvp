<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 */
class Employe implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $mdp;

    /**
     * @var \Ebene\MvpBundle\Entity\Retaurant
     */
    private $restaurant;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Employe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Employe
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    
        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set restaurant
     *
     * @param \Ebene\MvpBundle\Entity\Retaurant $restaurant
     * @return Employe
     */
    public function setRestaurant(\Ebene\MvpBundle\Entity\Retaurant $restaurant = null)
    {
        $this->restaurant = $restaurant;
    
        return $this;
    }

    /**
     * Get restaurant
     *
     * @return \Ebene\MvpBundle\Entity\Retaurant 
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }
    
    public function jsonSerialize() {
        return json_encode(
                array(
                    "id" => $this->id,
                    "nom" => $this->nom,
                    "mdp" => $this->mdp,
                ));
    }
    

    
    public function __toString() {
        return $this->getNom();
    }
}