<?php

declare(strict_types=1);

namespace Allekslar\SliderPlugin\Repository;

use Allekslar\SliderPlugin\Entity\Slider;
use Doctrine\ORM\NonUniqueResultException;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class SliderRepository extends EntityRepository
{
    public function getOneByCode(string $code): ?Slider
    {
        $qb = $this->createQueryBuilder('b');

        $qb
            ->addSelect('i')
            ->join('b.images', 'i')
            ->where('b.code = :code')
            ->setParameter('code', $code)
        ;

        try {
            $result = $qb->getQuery()->getOneOrNullResult();
        } catch (NonUniqueResultException $exception) {
            $result = null;
        }

        return $result;
    }
}
