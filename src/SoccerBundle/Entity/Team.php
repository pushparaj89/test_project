<?php

namespace SoccerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 */
class Team
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $logo_uri;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $players;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set logo_uri
     *
     * @param string $logoUri
     * @return Team
     */
    public function setLogoUri($logoUri)
    {
        $this->logo_uri = $logoUri;

        return $this;
    }

    /**
     * Get logo_uri
     *
     * @return string 
     */
    public function getLogoUri()
    {
        return $this->logo_uri;
    }

    /**
     * Add players
     *
     * @param \SoccerBundle\Entity\Player $players
     * @return Team
     */
    public function addPlayer(\SoccerBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    
public function __toString()
{
    return $this->getName() ? $this->getName() : "";
}
/**
     * Remove players
     *
     * @param \SoccerBundle\Entity\Player $players
     */
    public function removePlayer(\SoccerBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
