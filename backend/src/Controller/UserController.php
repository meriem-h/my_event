<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

/**
 * @Route("/user", name="user")
 */

class UserController extends AbstractController
{
    /**
     * @Route("/create", name="user_create" , methods={"POST"})
     */
    public function create(ManagerRegistry $doctrine, Request $request): Response
    {
        $EntityManager = $doctrine->getManager();
        $NewRequest = $request->request;

        $user = $doctrine
            ->getRepository(User::class)
            ->findOneBy([
                'email' => $NewRequest->get('email')
            ]);

        if (!$user) {

            $newUser = new User();
            $newUser->setEmail($NewRequest->get('email'));
            $newUser->getUsername($NewRequest->get('username'));
            $pass = password_hash($NewRequest->get('password'), PASSWORD_DEFAULT);
            $newUser->setPassword($pass);
            $newUser->setName($NewRequest->get('name'));
            $newUser->setPrenom($NewRequest->get('prenom'));
            $newUser->setAdresse($NewRequest->get('adress'));


            $EntityManager->persist($newUser);
            $EntityManager->flush();

            return $this->json([
                'success' => 'user registered'
            ]);
        }

        return $this->json([
            'err' => 'this user already exist',
        ]);
    }

    /**
     * @Route("/login", name="login", methods={"POST"} )
     */
    public function login(ManagerRegistry $doctrine, Request $request): Response
    {
        $newUser = $request->request;

        $user = $doctrine
            ->getRepository(User::class)
            ->findOneBy([
                "email" => $newUser->get("email")
            ]);

        // if ($user == null) {
        //     throw new HttpException(400, 'email or password incorrect');
        // }

        if ($user && password_verify($newUser->get('password'), $user->getPassword())) {
            return $this->json([
                "success" => $user->getId()
            ]);
        } else {
            return $this->json([
                "error" => "email or password incorrect"
            ]);
        }
    }

    /**
     * @Route("/read", name="user_read", methods={"POST"} )
     */
    public function read(ManagerRegistry $doctrine, Request $request): Response
    {
        $newUser = $request->request;

        $profile = $doctrine
            ->getRepository(User::class)
            ->findOneBy([
                "id" => $newUser->get("id")
            ]);

        if (!$profile) {
            return $this->json([
                "success" => "user not found"
            ]);
        } else {
            return $this->json([
                "success" => $profile
            ]);
        }
    }
    /**
     * @Route("/update", name="user_update", methods={"POST"} )
     */
    public function update(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();

        $requete = $request->request;

        $profile = $doctrine
            ->getRepository(User::class)
            ->findOneBy([
                "id" => $requete->get("id")
            ]);

        foreach ($requete as $key => $value) {

            switch ($key) {

                case 'username':
                    $profile->getUsername($value);
                    break;
                case 'name':
                    $profile->setName($value);
                    break;
                case 'prenom':
                    $profile->setPrenom($value);
                    break;
                case 'adress':
                    $profile->setAdresse($value);
                    break;
                case 'newPassword':
                    // $newUser->setPassword($NewRequest->get('password'));
                    if (password_verify($requete->get('password'), $profile->getPassword())) {
                        $value = password_hash($value, PASSWORD_DEFAULT);
                        $profile->setPassword($value);
                    } else {
                        return $this->json([
                            "error" => "wrong password"
                        ]);
                    }
                    break;
            }
        }

        $entityManager->flush();

        return $this->json([
            "success" => "your profile has been updated"
        ]);
    }

    /**
     * @Route("/delete", name="user_delete" , methods={"POST"} )
     */
    public function deleteAdress(ManagerRegistry $doctrine, Request $request): Response
    {
        $EntityManager = $doctrine->getManager();
        $NewRequest = $request->request;

        $user = $doctrine
            ->getRepository(User::class)
            ->findOneBy([
                'id' => $NewRequest->get('id')
            ]);

        if (empty($user)) {

            return $this->json([
                'success' =>  "user not found"
            ]);
        } else {

            $EntityManager->remove($user);
            $EntityManager->flush();

            return $this->json([
                "sucess" => "user information has been deleted sucessfully"
            ]);
        }
    }
}
