<?php

namespace App\Controller;


use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Score;
use App\FakeData;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ScoreController extends AbstractController
{


    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        $scores = $entityManager
            ->getRepository(Score::class)
            ->findAll();

        $games = $entityManager
            ->getRepository(Game::class)
            ->findAll();

        $players = $entityManager
            ->getRepository(Player::class)
            ->findAll();

        return $this->render("score/index", ["scores" => $scores,
            "games" => $games, "players" => $players]);
    }

    public function add(Request $request,EntityManagerInterface $entityManager): Response
    {
        $score= new Score();
        if ($request->getMethod() == Request::METHOD_GET) {
            /**
             * sauvegarder le score
             */
            $playerid = $request->get('player');
            $player = $entityManager->getRepository(Player::class)
                ->find($playerid);
            $gameid = $request->get('game');
            $game = $entityManager->getRepository(Game::class)
                ->find($gameid);

            $score->setPlayer($player);
             $score->setGame($game);
               $score->setScore($request->get('score'));
                $score->setCreatedAt();
            $entityManager->persist($score);
            $entityManager->flush();
            return $this->redirectTo("/score");

        }
    }
    public function delete($id,EntityManagerInterface $entityManager): Response
    {
        /**
         * supprimer l'objet
         */
        $score = $entityManager->getRepository(Score::class)->find($id);
        $entityManager->remove($score);
        $entityManager->flush();

        return $this->redirectTo("/Score");

    }


}