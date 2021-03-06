<?php

namespace Blogger\BlogBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    public function getLatestUsers($limit = null)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
		->select('b')->from($this->getEntityName(), "b")
		->addOrderBy('b.nume', 'ASC');
		if (false === is_null($limit))
		{
			$qb->setMaxResults($limit);
		}
		
		$query = $qb->getQuery();
		
		return $query->getResult();
    }
	

}
