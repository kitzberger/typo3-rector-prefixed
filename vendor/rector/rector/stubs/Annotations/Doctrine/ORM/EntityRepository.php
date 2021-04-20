<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Doctrine\ORM;

if (\class_exists('Doctrine\\ORM\\EntityRepository')) {
    return;
}
// @see https://github.com/doctrine/orm/blob/2.8.x/lib/Doctrine/ORM/EntityRepository.php
class EntityRepository
{
    /**
     * @var EntityManagerInterface
     */
    protected $_em;
    public function createQueryBuilder() : \Typo3RectorPrefix20210420\Doctrine\ORM\QueryBuilder
    {
        return new \Typo3RectorPrefix20210420\Doctrine\ORM\QueryBuilder();
    }
}
