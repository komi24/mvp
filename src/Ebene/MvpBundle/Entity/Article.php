<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article implements \JsonSerializable
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
    private $listesecondaires;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listesecondaires = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add listesecondaires
     *
     * @param \Ebene\MvpBundle\Entity\Secondaire $listesecondaires
     * @return Article
     */
    public function addListesecondaire(\Ebene\MvpBundle\Entity\Secondaire $listesecondaires)
    {
        $this->listesecondaires[] = $listesecondaires;
    
        return $this;
    }

    /**
     * Remove listesecondaires
     *
     * @param \Ebene\MvpBundle\Entity\Secondaire $listesecondaires
     */
    public function removeListesecondaire(\Ebene\MvpBundle\Entity\Secondaire $listesecondaires)
    {
        $this->listesecondaires->removeElement($listesecondaires);
    }

    /**
     * Get listesecondaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListesecondaires()
    {
        return $this->listesecondaires;
    }
    
    public function jsonSerialize() {
        return json_encode(
                array(
                    "id" => $this->id,
                    "nom" => $this->nom,
                    "description" => $this->description,
                    "prix" => $this->prix,
                    "photo" => $this->photo,
                ));
    }
    
    public function __toString() {
        return $this->getNom();
    }
}