<?php


namespace App\Controller;

use App\Entity\GameJson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController {
    /**
     * @Route(
     *     name="byPlatform",
     *     path="/getByPlatform",
     *     methods={"GET"},
     *     defaults={
     *          "_api_ressource_class"=Game::class,
     *     }
     * )
     *
     * @return JsonResponse
     */
    public function getByPlatform(){
        $platformName = $_GET['platform'];
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $platform = $em->getRepository('App\Entity\Platform')->findOneBy(array('name' => $platformName));
        $platformId =$platform->getId();

        $games = $em->getRepository('App\Entity\Game')->findBy(array('platform' => $platformId));

        $gameList = array();
        foreach ($games as $game){
            $tmpGame = new GameJson();
            $tmpGame->setId($game->getId());
            $tmpGame->setTitle($game->getTitle());
            $tmpGame->setPlatform($game->getPlatform());

            $gameList[] = $tmpGame;
        }

        return JsonResponse::fromJsonString($serializer->serialize($gameList, 'json'));
    }
}
