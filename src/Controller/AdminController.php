<?php

namespace App\Controller;

use App\Entity\Building;
use App\Entity\Room;
use App\Service\BuildRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class AdminController extends AbstractController
{


    #[Route('/admin' , name:'admin_homepage')]
    public function homepage():Response
    {
        return $this->render('admin/homepage.html.twig', [
            'title' => 'Admin homepage'
        ]);

    }



    #[Route('/admin/rooms/{slug}', name:'admin_rooms')]
    public function rooms($slug = null):Response
    {

        if($slug)
        {
            $title =' Room: '. u(str_replace('-', ' ', $slug))->title(true);
            return $this->render('admin/singleRoom.html.twig', [
                'name' => $title
            ]);
        }
        else
        {
            $title = 'Admin Rooms Page, All Rooms';

            return $this->render('admin/adminAllRooms.html.twig', [
                'rooms' => $title
            ]);
        }


    }

    #[Route('/admin/personnel/{slug}', name:'admin_personnel')]
    public function personnel($slug = null):Response
    {

        if($slug)
        {
            $title =' Personnel: '. u(str_replace('-', ' ', $slug))->title(true);
            return $this->render('admin/singlePersonnel.html.twig', [
                'name' => $title
            ]);
        }
        else
        {

            $title = 'Admin Personnel Page, All Personnel';
            return $this->render('admin/adminAllPersonnel.html.twig', [
                'personnel' => $title
            ]);
        }



    }


    #[Route('/admin/requests', name:'admin_requests')]
    public function requests():Response
    {
        return $this->render('admin/requests.html.twig', [
            'title' => 'Admin homepage'
        ]);

    }

    #[Route('/allBuildings')]
    public function printAllBuildings(  EntityManagerInterface $entityManager): Response
    {
        $room= new Room();


        return new Response($room->getStatus());
    }






}