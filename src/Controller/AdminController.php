<?php

namespace App\Controller;

use App\Entity\Building;
use App\Entity\Personnel;
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

    #[Route('/admin/personnel', name:'admin_allPersonnel')]
    public function allPersonnel(EntityManagerInterface $entityManager):Response
    {

        $repository = $entityManager->getRepository(Personnel::class);


            /** @var Personnel|null $personnel */
            $personnel = $repository->findAll();

            if(!$personnel)
            {
                throw $this->createNotFoundException(sprintf('no personnel available'));
            }

            return $this->render('admin/adminAllPersonnel.html.twig', [
                'personnel' => $personnel
            ]);


    }




    #[Route('/admin/personnel/{slug}', name:'admin_personnel')]
    public function personnel($slug = null, EntityManagerInterface $entityManager):Response
    {

        $repository = $entityManager->getRepository(Personnel::class);


            /** @var Personnel|null $personel */
            $personnel = $repository->findOneBy(['id'=>$slug]);

            if(!$personnel)
            {
                throw $this->createNotFoundException(sprintf('no personnel found with this name: '.$slug));
            }

            return $this->render('admin/singlePersonnel.html.twig', [
                'personnel' => $personnel,

            ]);

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