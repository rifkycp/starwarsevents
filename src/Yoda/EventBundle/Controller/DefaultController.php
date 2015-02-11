<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
//        $em = $this->container->get('doctrine')->getManager();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('YodaEventBundle:Event');
        $event = $repo->findOneBy(array('name'=>'Dart\'s surprise birthday party.'));
        return $this->render('YodaEventBundle:Default:index.html.twig', array('name' => $name, 'event'=>$event));
    }
}
