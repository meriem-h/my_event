<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Event;

/**
 * @Route("/event", name="event")
 */

class UserController extends AbstractController
{
    /**
     * @Route("/create", name="event_create" , methods={"POST"})
     */
    public function create(ManagerRegistry $doctrine, Request $request): Response
    {
        $EntityManager = $doctrine->getManager();
        $NewRequest = $request->request;

            $newEvent = new Event();
            $newEvent->setIdEvent($NewRequest->get('id_event'));
            $newEvent->setIdUser($NewRequest->get('id_user'));

            $EntityManager->persist($newEvent);
            $EntityManager->flush();

        return $this->json([
            'success' => 'new event addes for this user',
        ]);
    }

    /**
     * @Route("/his", name="event_his", methods={"POST"} )
     */
    public function his_event (ManagerRegistry $doctrine, Request $request): Response
    {
        $newUser = $request->request;

        $event = $doctrine
            ->getRepository(Event::class)
            ->findBy([
                "id_user_id" => $newUser->get("id_user")
            ]);

        if (!$event) {
            return $this->json([
                "success" => "there is no event"
            ]);
        } else {
            return $this->json([
                "success" => $event
            ]);
        }
    }

    /**
     * @Route("/who", name="event_who", methods={"POST"} )
     */
    public function event_who (ManagerRegistry $doctrine, Request $request): Response
    {
        $newUser = $request->request;

        $who = $doctrine
            ->getRepository(Event::class)
            ->findBy([
                "id_event" => $newUser->get("id_event")
            ]);

        if (!$who) {
            return $this->json([
                "success" => "there is no event"
            ]);
        } else {
            return $this->json([
                "success" => $who
            ]);
        }
    }

    /**
     * @Route("/delete", name="event_delete" , methods={"POST"} )
     */
    public function deleteAdress(ManagerRegistry $doctrine, Request $request): Response
    {
        $EntityManager = $doctrine->getManager();
        $NewRequest = $request->request;

        $event = $doctrine
            ->getRepository(Event::class)
            ->findOneBy([
                'id' => $NewRequest->get('id')
            ]);

        if (empty($event)) {

            return $this->json([
                'success' =>  "event not found"
            ]);
        } else {

            $EntityManager->remove($event);
            $EntityManager->flush();

            return $this->json([
                "sucess" => "event been deleted sucessfully"
            ]);
        }
    }
}
