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
    public function getAbsolutePath()
    {
        return null === $this->image_uri
            ? null
            : $this->getUploadRootDir().'/'.$this->image_uri;
    }

    public function getWebPath()
    {
        return null === $this->logo_uri
            ? null
            : $this->getUploadDir().'/'.$this->image_uri;
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
        if (null === $this->getImageUri()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
//       echo $this->getUploadRootDir();exit;
        $this->getImageUri()->move(
            $this->getUploadRootDir(),
            $this->getImageUri()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->image_uri = $this->getImageUri()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
//        $this->file = null;
    }
 
}


