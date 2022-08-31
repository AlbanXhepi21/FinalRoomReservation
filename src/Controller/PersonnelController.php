<?php

namespace App\Controller;

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

    #[Route('/bookings/{slug}')]
    public function rooms($slug = null):Response
    {

        if($slug)
        {
            $title ='Personnel Book Page,   Room: '. u(str_replace('-', ' ', $slug))->title(true);
        }
        else
            $title = 'Personnel Book Page , All Bookings Available';

        return $this->render('personnel/personnelAllBookings.html.twig', [
            'bookings' => $title
        ]);

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