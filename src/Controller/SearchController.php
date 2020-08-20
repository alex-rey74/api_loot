<?php

namespace App\Controller;


use App\Entity\SearchJson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController{

    /**
     * @Route(
     *     name="matchSearches",
     *     path="/matchSearches",
     *     methods={"GET"},
     *     defaults={
     *          "_api_ressource_class"=Search::class,
     *     }
     * )
     *
     * @return JsonResponse
     */
    public function matchSearches(){
        $emetorId = $_GET['id'];
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $searchRepo = $em->getRepository('App\Entity\Search');

        $originalSearch = $searchRepo->findOneBy(array('id' => $emetorId));

        $searches = $searchRepo->getMatchingSearches(array(
            'game' => $originalSearch->getGame()->getId(),
            'type' => $originalSearch->isType(),
            'createdAt' => $originalSearch->getCreatedAt()
        ));

        $searchesList = array();

        foreach ($searches as $search){
            if($search->getId() != $emetorId){
                $tmpSearch = new SearchJson();
                $tmpSearch->setId($search->getId());
                $tmpSearch->setType($search->isType());
                $tmpSearch->setCreatedAt($search->getCreatedAt());
                $tmpSearch->setNbrJoueur($search->getNbrJoueur());
                $tmpSearch->setIdUser($search->getUser()->getId());
                $tmpSearch->setIdGame($search->getGame()->getId());

                $searchesList[] = $tmpSearch;
            }


        }

        return JsonResponse::fromJsonString($serializer->serialize($searchesList, 'json'));
    }
}
