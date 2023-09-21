<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager) : void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setLogin("user$i");
            $user->setPassword("password$i");
            $user->setCreatedAt(new \DateTime());

            $manager->persist($user);
        }

        $manager->flush();
    }
}
