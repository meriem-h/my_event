<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;


class LoginController extends AbstractController
{
    /**
     * @Route("/api/login", name="app_login", methods={"POST"})
     */

    public function login(Request $request, UserRepository $userRepository)
    {
            $content = $request->getContent();
            $json = json_decode($content, true);
            $email = $json['email'];
            $password  = $json['password'];

            
            $user = $userRepository->findOneBy([
                    'email'=>$email,
            ]);
            if (!$user || $user->getPassword() != $password){
                    return $this->json([
                        'message' => 'Email ou mot de passe invalide!',
                    ], 400);

            }
           $payload = [
               "user" => $user->getUsername(),
               "exp"  => (new \DateTime())->modify("+10 minutes")->getTimestamp(),
           ];
    
    
            return $this->json($payload, 200);
    }
}
