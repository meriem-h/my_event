<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\DataService;

class DataController extends AbstractController
{

    /**
     * @Route("/api/concert", name="concert", methods={"GET"})
     */
    public function concert(DataService $dataService): Response
   {
     $_display = $dataService->concertData();
    //  $json = json_decode($_display, true);
       return $this->json([
           'donnees' => $_display,
       ]);
   }

   /**
     * @Route("/api/danse", name="danse", methods={"GET"})
     */
    public function danse(DataService $dataService): Response
    {
        $_display = $dataService->danseData();
           return $this->json([
               'donnees' => $_display,
           ]);
    }

    
   /**
     * @Route("/api/conference", name="conference", methods={"GET"})
     */
    public function conference(DataService $dataService): Response
    {
        $_display = $dataService->expoData();
           return $this->json([
               'Expositions au musees' => $_display,
           ]);
    }
}

