<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Msg;

/**
 * @Route("/msg", name="msg")
 */

class UserController extends AbstractController
{
    /**
     * @Route("/create", name="msg_create" , methods={"POST"})
     */
    public function create(ManagerRegistry $doctrine, Request $request): Response
    {
        $EntityManager = $doctrine->getManager();
        $NewRequest = $request->request;

            $newMessage = new Msg();
            $newMessage->setIdSender($NewRequest->get('id_sender'));
            $newMessage->setIdReciever($NewRequest->get('id_reciever'));
            $newMessage->setMessage($NewRequest->get('message'));

            $EntityManager->persist($newMessage);
            $EntityManager->flush();

        return $this->json([
            'success' => 'new event addes for this user',
        ]);
    }

    /**
     * @Route("/his", name="msg_his", methods={"POST"} )
     */
    public function his_event (ManagerRegistry $doctrine, Request $request): Response
    {
        $newUser = $request->request;

        $msg = $doctrine
            ->getRepository(Msg::class)
            ->findBy([
                "id_reciever_id" => $newUser->get("id_reciever")
            ]);

        if (!$msg) {
            return $this->json([
                "success" => "there is message"
            ]);
        } else {
            return $this->json([
                "success" => $msg
            ]);
        }
    }

}
