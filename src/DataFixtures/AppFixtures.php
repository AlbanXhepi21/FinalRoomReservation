<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Building;
use App\Entity\Personnel;
use App\Entity\Reservation;
use App\Entity\Room;
use App\Factory\BuildingFactory;
use App\Factory\RoomFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use function Zenstruck\Foundry\faker;

class AppFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {
       // BuildingFactory::new()->createMany(4);
//
//        $admin= new Admin();
//        $admin->setName('Mario');
//        $admin->setSurname('Bregu');
//        $admin->setEmail('mario@gmail.com');
//        $admin->setPassword('password');
//        $admin->setBirthday(faker()->dateTimeInInterval('-20 years'));
//
//
//        $building = new Building();
//        $building->setName('Freedom');
//        $building->setAddress('Don Bosko');
//        $building->setOwner($admin);
//
//        $building1 = new Building();
//        $building1->setName('Freedom');
//        $building1->setAddress('Don Bosko');
//        $building1->setOwner($admin);
//
//
//
//        $room = new Room();
//
//        $status = [1,1,1,1,1,1,1];
//        $room->setName('A23');
//        $room->setBuilding($building);
//        $room->setCapacity(10);
//        $room->setStatus($status);
//
//        $personnel = new Personnel();
//        $personnel->setName('Alban');
//        $personnel->setSurname('Xhepi');
//        $personnel->setEmail('albanxhepi@gmail.com');
//        $personnel->setBirthday(faker()->dateTimeInInterval("-20 years"));
//        $personnel->setPassword('helloWorld');
//
//        $reservation = new Reservation();
//
//        $reservation->setDate(faker()->dateTimeInInterval('-1 year'));
//         $reservation->setRoom($room);
//         $reservation->setState('Free');
//         $reservation->addPersonnel($personnel);
//
//
//
//
//
//         $manager->persist($admin);
//         $manager->persist($personnel);
//        $manager->persist($building);
//        $manager->persist($room);
//        $manager->persist($reservation);

        
        UserFactory::createOne(['email' => 'albanxhepi@gmail.com']);
        UserFactory::createMany(10);

         $manager->flush();
    }
}
