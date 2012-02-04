<?php

namespace Brickstorm\FollowBundle\Manager;

use Application\Sonata\UserBundle\Entity\User;

//use Brickstorm\FollowBundle\Entity\Follow;

class FollowManager
{
    protected $em       = null;
    protected $model    = null;
    protected $id       = null;

    public function __construct($object, $em){
      $this->em     = $em;
    }

    public function init($object){
      $this->model  = get_class($object);
      $this->id     = $object->getId();
    }

    /**
    * add a follower to this parliament
    *
    */
    public function addFollower(User $user) {
      $f = $this->em->getRepository('BrickstormFollowBundle:Follow')
                    ->findOneBy(array('follow_model' => $this->model,
                                      'follow_id'    => $this->id,
                                      'user'         => $user));
      if (!$f) {
        $f = new Follow();
        $f->setUser($user);
        $f->setFollowModel($this->model);
        $f->setFollowId($this->id);
        $this->em->persist($f);
        $this->em->flush();
      }
    }

    /**
    * remove a follower to this parliament
    *
    */
    public function removeFollower(User $user) {
      $f = $this->em->getRepository('BrickstormFollowBundle:Follow')
                    ->findOneBy(array('follow_model' => $this->model,
                                      'follow_id'    => $this->id,
                                      'user'         => $user));
      if ($f) {
        $this->em->remove($f);
        $this->em->flush();
      }
    }

    /**
    * get all followers of this parliament
    *
    */
    public function getFollowers() {
      $qb = $this->em->createQueryBuilder();
      $qb->add('select', 'u')
         ->add('from', 'Application\Sonata\UserBundle\Entity\User u')
         ->innerJoin('u.follows', 'Brickstorm\FollowBundle\Entity\Follow f')
         ->add('where', 'f.follow_model = ?1')
         ->add('where', 'f.follow_id = ?2')
         ->setParameter(1, $this->model)
         ->setParameter(1, $this->id);

      $query = $qb->getQuery();
    }
}