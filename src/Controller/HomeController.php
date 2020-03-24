<?php

namespace App\Controller;

use App\Game\GameMaker;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractFOSRestController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        $army1 = $request->query->get('army1');
        $army2 = $request->query->get('army2');

        if (empty($army1) || empty($army2))
        {
            throw new BadRequestHttpException("Content is not a valid, please provide army1 and army2 params");
        }

        $armyGame = new GameMaker($army1, $army2);
        $gameData = $armyGame->start();

        return $this->view($gameData, Response::HTTP_OK);
    }
}
