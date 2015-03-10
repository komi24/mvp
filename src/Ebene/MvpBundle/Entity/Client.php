<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 */
class Client implements \JsonSerializable
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listecommandes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listecommandes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Client
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
     * @return Client
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
     * Add listecommandes
     *
     * @param \Ebene\MvpBundle\Entity\Commande $listecommandes
     * @return Client
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