<?php
namespace App\Controller;


use App\FakeData;
use App\Entity\Player;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class PlayerController extends AbstractController
{


    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        /**
         *  lister les joueurs
         */
        // $players = FakeData::players(25);
        $players = $entityManager
            ->getRepository(Player::class)
            ->findAll();
        return $this->render("player/index", ["players" => $players]);

    }

    public function add(Request $request,EntityManagerInterface $entityManager): Response
    {
        //$player = FakeData::players(1)[0];
        $player = new Player();
        if ($request->getMethod() == Request::METHOD_POST) {
            $player
                ->setEmail($request->get('email'))
                ->setUsername($request->get('username'));
            $entityManager->persist($player);
            $entityManager->flush();
            return $this->redirectTo("/player");
        }
        return $this->render("player/form", ["player" => $player]);
    }


    public function show($id,EntityManagerInterface $entityManager): Response
    {
        //$player = FakeData::players(1)[0];
        $player = $entityManager->getRepository(Player::class)
            ->find($id);
        return $this->render("player/show", ["player" => $player, "availableGames" => FakeData::games()]);
    }


    public function edit($id, Request $request,EntityManagerInterface $entityManager): Response
    {
        //$player = FakeData::players(1)[0];
        $player = $entityManager->getRepository(Player::class)
        ->find($id);

    if ($request->getMethod() == Request::METHOD_POST) {
        /**
         * enregistrer l'objet
         */
        $player
            ->setEmail($request->get('email'))
            ->setUsername($request->get('username'));
        $entityManager->persist($player);
        $entityManager->flush();
        return $this->redirectTo("/player");
    }
        return $this->render("player/form", ["player" => $player]);


    }

    public function delete($id,EntityManagerInterface $entityManager): Response
    {
        /**
         * supprimer l'objet
         */
        $player = $entityManager->getRepository(Player::class)->find($id);
        $entityManager->remove($player);
        $entityManager->flush();
        return $this->redirectTo("/player");

    }

    public function addGame($id,Request $request,EntityManagerInterface $entityManager): Response
    {
        $player = $entityManager->getRepository(Player::class)
            ->find($id);
            
        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * enregistrer l'objet
             */
            $player
                ->setGame($request->get('jeu'));
                $entityManager->persist($player);
                $entityManager->flush();
            return $this->redirectTo("/player");
        }
    }

}
