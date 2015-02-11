<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.


$loader = require_once __DIR__.'/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request',$request);

//play around
//
//$templating = $container->get('templating');
//
//echo $templating->render('YodaEventBundle:Default:index.html.twig',array(
//   'name'=> 'Vader', 'count'=> 3
//));

use Yoda\EventBundle\Entity\Event;

$event = new Event();
$event->setName('Dart\'s surprise birthday party.');
$event->setLocation('Deathstar');
$event->setTime(new \DateTime('tomorrow noon'));
//$event->setDetails('HA! Dart Vader hate surprise!!!!');

$em = $container->get('doctrine')->getManager();
$em->persist($event);
$em->flush();