<?php

namespace App\Controller;

use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{



    #[Route('/admin/rooms')]
    public function show(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Room::class);
        /** @var Room|null $rooms */
        $rooms = $repository->findAll();

        if(!$rooms)
        {
            throw $this->createNotFoundException(sprintf('no room available'));
        }

        return $this->render('admin/adminAllRooms.html.twig', [
            'rooms' => $rooms
        ]);


    }



    #[Route('/admin/rooms/{slug}')]
    public function rooms($slug, EntityManagerInterface $entityManager):Response
    {

        $repository = $entityManager->getRepository(Room::class);



        /** @var Room|null $room */
        $room = $repository->findOneBy(['id'=>$slug]);

        if(!$room)
        {
            throw $this->createNotFoundException(sprintf('no room found with this name: '.$slug));
        }

        $status = [1,0,0,0,1,1,0,1];
        $room->setStatus($status);
        return $this->render('admin/singleRoom.html.twig', [
            'room' => $room,

        ]);



    }



}