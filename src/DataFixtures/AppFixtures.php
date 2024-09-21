<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\EquipementFactory;
use App\Factory\InterventionFactory;
use App\Factory\TechnicienFactory;
use App\Factory\UsersFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        UsersFactory::createMany(10);
        EquipementFactory::createMany(30);
        InterventionFactory::createMany(10);
        TechnicienFactory::createMany(25);
        // // $product = new Product();
        // // $manager->persist($product);
        // $users = new Users();
        // $manager->persist($users);
        $manager->flush();
    }
}
