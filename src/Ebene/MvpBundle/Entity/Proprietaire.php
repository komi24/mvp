<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proprietaire
 */
class Proprietaire implements \JsonSerializable
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
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listerestaurants;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listerestaurants = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return Proprietaire
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
     * @return Proprietaire
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
     * Set tel
     *
     * @param string $tel
     * @return Proprietaire
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Proprietaire
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add listerestaurants
     *
     * @param \Ebene\MvpBundle\Entity\Restaurant $listerestaurants
     * @return Proprietaire
     */
    public function addListerestaurant(\Ebene\MvpBundle\Entity\Restaurant $listerestaurants)
    {
        $this->listerestaurants[] = $listerestaurants;
    
        return $this;
    }

    /**
     * Remove listerestaurants
     *
     * @param \Ebene\MvpBundle\Entity\Restaurant $listerestaurants
     */
    public function removeListerestaurant(\Ebene\MvpBundle\Entity\Restaurant $listerestaurants)
    {
        $this->listerestaurants->removeElement($listerestaurants);
    }

    /**
     * Get listerestaurants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListerestaurants()
    {
        return $this->listerestaurants;
    }
    
    public function jsonSerialize() {
        return json_encode(
                array(
                    "id" => $this->id,
                    "nom" => $this->nom,
                    "mdp" => $this->mdp,
                    "tel" => $this->tel,
                    "adresse" => $this->adresse, 
                ));
    }
    
    public function __toString() {
        return $this->getNom();
    }
}