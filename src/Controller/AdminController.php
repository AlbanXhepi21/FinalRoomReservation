<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class AdminController extends AbstractController
{


    #[Route('/admin')]
    public function homepage():Response
    {
        return $this->render('admin/adminHomepage.html.twig', [
            'title' => 'Admin homepage'
        ]);

    }

    #[Route('/admin/rooms/{slug}')]
    public function rooms($slug = null):Response
    {

        if($slug)
        {
            $title ='Admin Rooms Page,   Room: '. u(str_replace('-', ' ', $slug))->title(true);
        }
        else
            $title = 'Admin Rooms Page, All Rooms';

        return $this->render('admin/adminAllRooms.html.twig', [
            'rooms' => $title
        ]);

    }

    #[Route('/admin/personnel/{slug}')]
    public function personnel($slug = null):Response
    {

        if($slug)
        {
            $title ='Admin Personnel Page,   Personnel: '. u(str_replace('-', ' ', $slug))->title(true);
        }
        else
            $title = 'Admin Personnel Page, All Personnel';

        return $this->render('admin/adminAllPersonnel.html.twig', [
            'personnel' => $title
        ]);

    }

}