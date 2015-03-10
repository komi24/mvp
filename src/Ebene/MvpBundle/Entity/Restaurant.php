<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 */
class Restaurant implements \JsonSerializable
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
    private $couleur1;

    /**
     * @var string
     */
    private $couleur2;

    /**
     * @var string
     */
    private $couleur3;

    /**
     * @var \DateTime
     */
    private $dateexp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listecommandes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listesections;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listeemployes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listeabonnements;

    /**
     * @var \Ebene\MvpBundle\Entity\Proprietaire
     */
    private $proprietaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listecommandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->listesections = new \Doctrine\Common\Collections\ArrayCollection();
        $this->listeemployes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->listeabonnements = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Restaurant
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
     * Set couleur1
     *
     * @param string $couleur1
     * @return Restaurant
     */
    public function setCouleur1($couleur1)
    {
        $this->couleur1 = $couleur1;
    
        return $this;
    }

    /**
     * Get couleur1
     *
     * @return string 
     */
    public function getCouleur1()
    {
        return $this->couleur1;
    }

    /**
     * Set couleur2
     *
     * @param string $couleur2
     * @return Restaurant
     */
    public function setCouleur2($couleur2)
    {
        $this->couleur2 = $couleur2;
    
        return $this;
    }

    /**
     * Get couleur2
     *
     * @return string 
     */
    public function getCouleur2()
    {
        return $this->couleur2;
    }

    /**
     * Set couleur3
     *
     * @param string $couleur3
     * @return Restaurant
     */
    public function setCouleur3($couleur3)
    {
        $this->couleur3 = $couleur3;
    
        return $this;
    }

    /**
     * Get couleur3
     *
     * @return string 
     */
    public function getCouleur3()
    {
        return $this->couleur3;
    }

    /**
     * Set dateexp
     *
     * @param \DateTime $dateexp
     * @return Restaurant
     */
    public function setDateexp($dateexp)
    {
        $this->dateexp = $dateexp;
    
        return $this;
    }

    /**
     * Get dateexp
     *
     * @return \DateTime 
     */
    public function getDateexp()
    {
        return $this->dateexp;
    }

    /**
     * Add listecommandes
     *
     * @param \Ebene\MvpBundle\Entity\Commande $listecommandes
     * @return Restaurant
     */
    public function addListecommande(\Ebene\MvpBundle\Entity\Commande $listecommandes)
    {
        $this->listecommandes[] = $listecommandes;
    
        return $this;
    }

    /**
     * Remove listecommandes
     *
     * @param \Ebene\MvpBundle\Entity\Commande $listecommandes
     */
    public function removeListecommande(\Ebene\MvpBundle\Entity\Commande $listecommandes)
    {
        $this->listecommandes->removeElement($listecommandes);
    }

    /**
     * Get listecommandes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListecommandes()
    {
        return $this->listecommandes;
    }

    /**
     * Add listesections
     *
     * @param \Ebene\MvpBundle\Entity\Section $listesections
     * @return Restaurant
     */
    public function addListesection(\Ebene\MvpBundle\Entity\Section $listesections)
    {
        $this->listesections[] = $listesections;
    
        return $this;
    }

    /**
     * Remove listesections
     *
     * @param \Ebene\MvpBundle\Entity\Section $listesections
     */
    public function removeListesection(\Ebene\MvpBundle\Entity\Section $listesections)
    {
        $this->listesections->removeElement($listesections);
    }

    /**
     * Get listesections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListesections()
    {
        return $this->listesections;
    }

    /**
     * Add listeemployes
     *
     * @param \Ebene\MvpBundle\Entity\Employe $listeemployes
     * @return Restaurant
     */
    public function addListeemploye(\Ebene\MvpBundle\Entity\Employe $listeemployes)
    {
        $this->listeemployes[] = $listeemployes;
    
        return $this;
    }

    /**
     * Remove listeemployes
     *
     * @param \Ebene\MvpBundle\Entity\Employe $listeemployes
     */
    public function removeListeemploye(\Ebene\MvpBundle\Entity\Employe $listeemployes)
    {
        $this->listeemployes->removeElement($listeemployes);
    }

    /**
     * Get listeemployes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListeemployes()
    {
        return $this->listeemployes;
    }

    /**
     * Add listeabonnements
     *
     * @param \Ebene\MvpBundle\Entity\Abonnement $listeabonnements
     * @return Restaurant
     */
    public function addListeabonnement(\Ebene\MvpBundle\Entity\Abonnement $listeabonnements)
    {
        $this->listeabonnements[] = $listeabonnements;
    
        return $this;
    }

    /**
     * Remove listeabonnements
     *
     * @param \Ebene\MvpBundle\Entity\Abonnement $listeabonnements
     */
    public function removeListeabonnement(\Ebene\MvpBundle\Entity\Abonnement $listeabonnements)
    {
        $this->listeabonnements->removeElement($listeabonnements);
    }

    /**
     * Get listeabonnements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListeabonnements()
    {
        return $this->listeabonnements;
    }

    /**
     * Set proprietaire
     *
     * @param \Ebene\MvpBundle\Entity\Proprietaire $proprietaire
     * @return Restaurant
     */
    public function setProprietaire(\Ebene\MvpBundle\Entity\Proprietaire $proprietaire = null)
    {
        $this->proprietaire = $proprietaire;
    
        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return \Ebene\MvpBundle\Entity\Proprietaire 
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }
    
    public function jsonSerialize() {
        return json_encode(
                array(
                    "id" => $this->id,
                    "nom" => $this->nom,
                    "datexp" => $this->dateexp,
                ));
    }
    
    public function __toString() {
        return $this->getNom();
    }
}