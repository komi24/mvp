<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article
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
     * @var string
     */
    private $photo;

    /**
     * @var \Ebene\MvpBundle\Entity\Commande
     */
    private $commande;

    /**
     * @var \Ebene\MvpBundle\Entity\Section
     */
    private $section;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $secondaires;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->secondaires = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Article
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
     * @return Article
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
     * @return Article
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
     * Set photo
     *
     * @param string $photo
     * @return Article
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set commande
     *
     * @param \Ebene\MvpBundle\Entity\Commande $commande
     * @return Article
     */
    public function setCommande(\Ebene\MvpBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;
    
        return $this;
    }

    /**
     * Get commande
     *
     * @return \Ebene\MvpBundle\Entity\Commande 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set section
     *
     * @param \Ebene\MvpBundle\Entity\Section $section
     * @return Article
     */
    public function setSection(\Ebene\MvpBundle\Entity\Section $section = null)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return \Ebene\MvpBundle\Entity\Section 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Add secondaires
     *
     * @param \Ebene\MvpBundle\Entity\Secondaire $secondaires
     * @return Article
     */
    public function addSecondaire(\Ebene\MvpBundle\Entity\Secondaire $secondaires)
    {
        $this->secondaires[] = $secondaires;
    
        return $this;
    }

    /**
     * Remove secondaires
     *
     * @param \Ebene\MvpBundle\Entity\Secondaire $secondaires
     */
    public function removeSecondaire(\Ebene\MvpBundle\Entity\Secondaire $secondaires)
    {
        $this->secondaires->removeElement($secondaires);
    }

    /**
     * Get secondaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSecondaires()
    {
        return $this->secondaires;
    }
    public function __toString() {
        return $this->getNom();
    }

}
