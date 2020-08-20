<?php


namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class SearchRepository extends EntityRepository
{
    public function getMatchingSearches($param){
        $createdAt = $param['createdAt'];
        $from = new \DateTime($createdAt->format('Y-m-d H:i:s'));
        $to = new \DateTime($createdAt->format('Y-m-d H:i:s'));

        $from->sub(new \DateInterval('PT5M'));
        $to->add(new \DateInterval('PT5M'));

        return $this->createQueryBuilder('s')
            ->from('App\Entity\Search', 't')
            ->andWhere('s.game = :idGame')
            ->andWhere('s.type = :searchType')
            ->setParameter('idGame', $param['game'])
            ->setParameter('searchType', $param['type'])

            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

    }
}
