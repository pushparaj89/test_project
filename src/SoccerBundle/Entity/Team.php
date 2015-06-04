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

    public function getAbsolutePath()
    {
        return null === $this->logo_uri
            ? null
            : $this->getUploadRootDir().'/'.$this->logo_uri;
    }

    public function getWebPath()
    {
        return null === $this->logo_uri
            ? null
            : $this->getUploadDir().'/'.$this->logo_uri;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/';
    }
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getLogoUri()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
//       echo $this->getUploadRootDir();exit;
        $this->getLogoUri()->move(
            $this->getUploadRootDir(),
            $this->getLogoUri()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->logo_uri = $this->getLogoUri()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
//        $this->file = null;
    }
}
