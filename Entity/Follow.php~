<?php

namespace Brickstorm\FollowBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brickstorm\FollowBundle\Entity\Follow
 */
class Follow
{

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $follow_model
     */
    private $follow_model;

    /**
     * @var integer $follow_id
     */
    private $follow_id;

    /**
     * @var date $created_at
     */
    private $created_at;

    /**
     * @var Application\Sonata\UserBundle\Entity\User
     */
    private $user;


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
     * Set follow_model
     *
     * @param string $followModel
     */
    public function setFollowModel($followModel)
    {
        $this->follow_model = $followModel;
    }

    /**
     * Get follow_model
     *
     * @return string 
     */
    public function getFollowModel()
    {
        return $this->follow_model;
    }

    /**
     * Set follow_id
     *
     * @param integer $followId
     */
    public function setFollowId($followId)
    {
        $this->follow_id = $followId;
    }

    /**
     * Get follow_id
     *
     * @return integer 
     */
    public function getFollowId()
    {
        return $this->follow_id;
    }

    /**
     * Set created_at
     *
     * @param date $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return date 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set user
     *
     * @param Application\Sonata\UserBundle\Entity\User $user
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Application\Sonata\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}