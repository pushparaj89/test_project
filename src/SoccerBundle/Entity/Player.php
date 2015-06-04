<?php

namespace SoccerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 */
class Player
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $image_uri;

    /**
     * @var \SoccerBundle\Entity\Team
     */
    private $team;


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
     * Set first_name
     *
     * @param string $firstName
     * @return Player
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Player
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set image_uri
     *
     * @param string $imageUri
     * @return Player
     */
    public function setImageUri($imageUri)
    {
        $this->image_uri = $imageUri;

        return $this;
    }

    /**
     * Get image_uri
     *
     * @return string 
     */
    public function getImageUri()
    {
        return $this->image_uri;
    }

    /**
     * Set team
     *
     * @param \SoccerBundle\Entity\Team $team
     * @return Player
     */
    public function setTeam(\SoccerBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \SoccerBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }

 
}


