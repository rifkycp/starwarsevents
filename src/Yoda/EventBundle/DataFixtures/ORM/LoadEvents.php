<?php
/**
 * Created by PhpStorm.
 * User: rifky
 * Date: 2/11/15
 * Time: 10:26 AM
 */

namespace Yoda\EventBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Yoda\EventBundle\Entity\Event;


class LoadEvents implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $event1 = new Event();
        $event1->setName('Dart\'s surprise birthday party.');
        $event1->setLocation('Deathstar');
        $event1->setTime(new \DateTime('tomorrow noon'));
        $event1->setDetails('HA! Dart Vader hate surprise!!!!');
        $manager->persist($event1);

        $event2 = new Event();
        $event2->setName('Rebellion Fundraiser Bake Sale');
        $event2->setLocation('Endor');
        $event2->setTime(new \DateTime('Thursday noon'));
        $event2->setDetails('Support the rebellion');
        $manager->persist($event2);

        $manager->flush();
    }
}