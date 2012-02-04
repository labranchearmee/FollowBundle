<?php

namespace Brickstorm\FollowBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Application\Sonata\UserBundle\Entity\User;

class FollowController extends Controller
{
    /**
    * follow object
    *
    */
    public function followAction(Request $request)
    {
      $user   = $this->container->get('security.context')->getToken()->getUser();
      $object = $this->em->getRepository($request->get('follow_object'))
                         ->findOneById($request->get('follow_id'));

      if (!is_object($user) || !is_object($object)) {
          throw $this->createNotFoundException('bad.parameters');
      }

      $fm = $this->get('follow_manager');
      $fm->init($object);
      $fm->addFollower($user);
      
      $response = array('success' => true,
                        'message' => 'followed.successfull');
      return new Response(json_encode($response),200);
    }

    /**
    * unfollow object
    *
    */
    public function unfollowAction(Request $request)
    {
      $user   = $this->container->get('security.context')->getToken()->getUser();
      $object = $this->em->getRepository($request->get('follow_object'))
                         ->findOneById($request->get('follow_id'));

      if (!is_object($user) || !is_object($object)) {
          throw $this->createNotFoundException('bad.parameters');
      }
      
      $fm = $this->get('follow_manager');
      $fm->init($object);
      $fm->removeFollower($user);
      
      $response = array('success' => true,
                        'message' => 'removed.successfull');
      return new Response(json_encode($response),200);
    }
}