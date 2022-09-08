<?php

namespace App\Controller;

use App\Entity\Building;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class PersonnelController extends AbstractController
{

    #[Route('/')]
    public function homepage():Response
    {
        return $this->render('personnel/personnelHomepage.html.twig', [
            'title' => 'Personnel homepage'
        ]);

    }

    #[Route('new' , name:'new_building')]
    public function new(EntityManagerInterface $entityManager):Response
    {

        $building = new Building();

        $building->setName('Rainbow')
            ->setAddress('Don Bosko');

//
//        $entityManager->persist($building);
//        $entityManager->flush();

        return new Response(sprintf('New buiding Name: %s , and Address: %s , and Number of Rooms: %d and id: %d ',
            $building->getName(),
        $building->getAddress(),

        $building->getId()
            ));

    }

    #[Route('/book/{slug}/{room}')]
    public function book($slug = null, $room=null):Response
    {

        if($slug)
        {

            if($room)
            {


                return $this->render('personnel/singleRoom.html.twig', [
                    'building' => u(str_replace('-', ' ', $slug))->title(true),
                    'room' =>  u(str_replace('-', ' ', $room))->title(true)
                ]);


            }

            else{


                return $this->render('personnel/rooms.html.twig', [
                    'building' => u(str_replace('-', ' ', $slug))->title(true)
                ]);
            }


        }
        else
        {
            $title ='Personnel Book Page,   Room: '. u(str_replace('-', ' ', $slug))->title(true);

            return $this->render('personnel/book.html.twig', [
                'bookings' => $title
            ]);
        }


    }

    #[Route('/state')]
    public function personnel( ):Response
    {

        $title = 'Personnel States Page, All States';

        return $this->render('personnel/personnelAllStates.html.twig', [
            'state' => $title
        ]);

    }
}