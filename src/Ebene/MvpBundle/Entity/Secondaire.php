<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Secondaire
 */
class Secondaire implements \JsonSerializable
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
    private $description;

    /**
     * @var float
     */
    private $prix;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listearticles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listearticles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Secondaire
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
     * Set description
     *
     * @param string $description
     * @return Secondaire
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Secondaire
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Add listearticles
     *
     * @param \Ebene\MvpBundle\Entity\Articles $listearticles
     * @return Secondaire
     */
    public function addListearticle(\Ebene\MvpBundle\Entity\Articles $listearticles)
    {
        $this->listearticles[] = $listearticles;
    
        return $this;
    }

    /**
     * Remove listearticles
     *
     * @param \Ebene\MvpBundle\Entity\Articles $listearticles
     */
    public function removeListearticle(\Ebene\MvpBundle\Entity\Articles $listearticles)
    {
        $this->listearticles->removeElement($listearticles);
    }

    /**
     * Get listearticles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListearticles()
    {
        return $this->listearticles;
    }
    
    public function jsonSerialize() {
        return json_encode(array(
            "id" => $this->id,
            "nom" => $this->nom,
            "description" => $this->description,
            "prix" => $this->prix,
        ));
    }
    
    public function __toString() {
        return $this->getNom();
    }
}