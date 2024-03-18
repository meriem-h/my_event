<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\DataService;


class ConcertController extends AbstractController
{
    


    // public function concert(String $concert, DataService $dataService): Response
    // {
    //     $name = [];
    //     $description = [];
    //     $annotations = [];
    //     $label = [];
    //     $datas = $dataService->eventData();
 
    //     foreach ($datas['allData'] as $data) {
    //         if( $data['nom'] === $concert) {
    //             $name[] = $data['name'];
    //             $description[] = $data['description'];
    //             $annotations[] = $data['annotations'];
    //             $label[] = $data['label'];
    //             break;
    //         }
    //     }
    //     return $this->json([
    //         'message' => $dataService->getConcertData($concert)
    //         // 'message' => $dataService->concertData($concert)
    //     ]);
    // }
}
