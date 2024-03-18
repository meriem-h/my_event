<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    /**
     * @Route("/api/register", name="app_register", methods={"POST"})
     */
    public function register(Request $request)
    {
        $user = new User();
        $content = $request->getContent();
        $json = json_decode($content, true);
        $name  = $json['name'];
        $prenom = $json['prenom'];
        $email = $json['email'];
        $password  = $json['password'];

        $errors = [];
        if(!$errors)
        {
            $user->setName($name);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setPassword($password);

            try
            {
                $EntityM = $this->getDoctrine()->getManager();
                $EntityM->persist($user);
                $EntityM->flush();

                return $this->json([
                    'user' => $user
                ]);
            }
            catch(UniqueConstraintViolationException $e)
            {
                $errors[] = "Cet e-mail existe déjà!";
            }

        }
        return $this->json([
            'errors' => $errors
        ], 400);
        
    }
}