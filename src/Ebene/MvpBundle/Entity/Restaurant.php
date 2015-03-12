<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 */
class Restaurant
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
    private $commandes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sections;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $employes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $abonnements;

    /**
     * @var \Ebene\MvpBundle\Entity\Proprietaire
     */
    private $proprietaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sections = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->abonnements = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add commandes
     *
     * @param \Ebene\MvpBundle\Entity\Commande $commandes
     * @return Restaurant
     */
    public function addCommande(\Ebene\MvpBundle\Entity\Commande $commandes)
    {
        $this->commandes[] = $commandes;
    
        return $this;
    }

    /**
     * Remove commandes
     *
     * @param \Ebene\MvpBundle\Entity\Commande $commandes
     */
    public function removeCommande(\Ebene\MvpBundle\Entity\Commande $commandes)
    {
        $this->commandes->removeElement($commandes);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add sections
     *
     * @param \Ebene\MvpBundle\Entity\Section $sections
     * @return Restaurant
     */
    public function addSection(\Ebene\MvpBundle\Entity\Section $sections)
    {
        $this->sections[] = $sections;
    
        return $this;
    }

    /**
     * Remove sections
     *
     * @param \Ebene\MvpBundle\Entity\Section $sections
     */
    public function removeSection(\Ebene\MvpBundle\Entity\Section $sections)
    {
        $this->sections->removeElement($sections);
    }

    /**
     * Get sections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Add employes
     *
     * @param \Ebene\MvpBundle\Entity\Employe $employes
     * @return Restaurant
     */
    public function addEmploye(\Ebene\MvpBundle\Entity\Employe $employes)
    {
        $this->employes[] = $employes;
    
        return $this;
    }

    /**
     * Remove employes
     *
     * @param \Ebene\MvpBundle\Entity\Employe $employes
     */
    public function removeEmploye(\Ebene\MvpBundle\Entity\Employe $employes)
    {
        $this->employes->removeElement($employes);
    }

    /**
     * Get employes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployes()
    {
        return $this->employes;
    }

    /**
     * Add abonnements
     *
     * @param \Ebene\MvpBundle\Entity\Abonnement $abonnements
     * @return Restaurant
     */
    public function addAbonnement(\Ebene\MvpBundle\Entity\Abonnement $abonnements)
    {
        $this->abonnements[] = $abonnements;
    
        return $this;
    }

    /**
     * Remove abonnements
     *
     * @param \Ebene\MvpBundle\Entity\Abonnement $abonnements
     */
    public function removeAbonnement(\Ebene\MvpBundle\Entity\Abonnement $abonnements)
    {
        $this->abonnements->removeElement($abonnements);
    }

    /**
     * Get abonnements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAbonnements()
    {
        return $this->abonnements;
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
    public function __toString() {
        return $this->getNom();
    }
}
