<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 */
class Abonnement
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $nombretag;

    /**
     * @var float
     */
    private $prixtotal;

    /**
     * @var string
     */
    private $facture;

    /**
     * @var \DateTime
     */
    private $datedeb;

    /**
     * @var \DateTime
     */
    private $datefin;

    /**
     * @var \Ebene\MvpBundle\Entity\Restaurant
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
     * Set nombretag
     *
     * @param integer $nombretag
     * @return Abonnement
     */
    public function setNombretag($nombretag)
    {
        $this->nombretag = $nombretag;
    
        return $this;
    }

    /**
     * Get nombretag
     *
     * @return integer 
     */
    public function getNombretag()
    {
        return $this->nombretag;
    }

    /**
     * Set prixtotal
     *
     * @param float $prixtotal
     * @return Abonnement
     */
    public function setPrixtotal($prixtotal)
    {
        $this->prixtotal = $prixtotal;
    
        return $this;
    }

    /**
     * Get prixtotal
     *
     * @return float 
     */
    public function getPrixtotal()
    {
        return $this->prixtotal;
    }

    /**
     * Set facture
     *
     * @param string $facture
     * @return Abonnement
     */
    public function setFacture($facture)
    {
        $this->facture = $facture;
    
        return $this;
    }

    /**
     * Get facture
     *
     * @return string 
     */
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * Set datedeb
     *
     * @param \DateTime $datedeb
     * @return Abonnement
     */
    public function setDatedeb($datedeb)
    {
        $this->datedeb = $datedeb;
    
        return $this;
    }

    /**
     * Get datedeb
     *
     * @return \DateTime 
     */
    public function getDatedeb()
    {
        return $this->datedeb;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Abonnement
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    
        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set restaurant
     *
     * @param \Ebene\MvpBundle\Entity\Restaurant $restaurant
     * @return Abonnement
     */
    public function setRestaurant(\Ebene\MvpBundle\Entity\Restaurant $restaurant = null)
    {
        $this->restaurant = $restaurant;
    
        return $this;
    }

    /**
     * Get restaurant
     *
     * @return \Ebene\MvpBundle\Entity\Restaurant 
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }
    
    public function __toString() {
        return "Facture".$this->getId();
    }

}
